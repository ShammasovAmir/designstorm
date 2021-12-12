@extends('layouts.account')

@section('title')
    Account - Dashboard
@endsection

@section('content')
    <div>
      <h1>{{ $project->title }}</h1>
      <h6>View selected project</h6>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="row">
              <div class="col-md-10">
                <div class="img-section">
                  <div class="row">
                    {{-- <div class="col-md-3">
                      <div class="box" style="margin: 1rem">
                        <div
                          style="position: relative; background: url('https://images.unsplash.com/photo-1509395176047-4a66953fd231?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwyODIyNzB8MHwxfHNlYXJjaHwyM3x8d2ViJTIwZGVzaWdufGVufDB8fHx8MTYzOTIyMzQ3NA&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=400') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        </div>
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <a href="/account/projects/{{ $project->id }}/edit" class="btn">Edit</a>
                <form method="POST" action="/account/projects/{{$project->id}}/delete">
                  @csrf
                  @method('DELETE')
                  <button class="btn delete-btn">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script>
      
    </script>
@endsection
