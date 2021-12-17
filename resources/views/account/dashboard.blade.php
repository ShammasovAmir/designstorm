@extends('layouts.account')

@section('title')
    Account - Dashboard
@endsection

@section('content')
    <div>
        <h1>Dashboard</h1>
        <h6>This is your latest information</h6>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box projects-total">
                    <h1>Projects Total</h1>
                    <span class="large-number">{{ $projects_total }}</span>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    @foreach ($projects as $project)
                        "{{ $project->title }}",
                    @endforeach
                ],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [
                            @foreach ($projects_inspiration_count as $inspiration_count)
                                "{{ $inspiration_count }}",
                            @endforeach
                        ],
                        backgroundColor: [
                            @foreach ($colors_array as $color)
                                "{{ $color }}",
                            @endforeach
                        ],
                        borderColor: [
                            @foreach ($colors_array as $color)
                                "{{ $color }}",
                            @endforeach
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>    
@endsection

