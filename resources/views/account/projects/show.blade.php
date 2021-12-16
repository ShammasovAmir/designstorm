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
                    @foreach ($project->inspirations as $inspiration)
                      <div class="col-md-4">
                        <div class="box" style="margin: 1rem">
                          <div
                            style="position: relative; background: url('{{ $inspiration->image_url }}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                          </div>
                        </div>
                      </div>
                    @endforeach
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
