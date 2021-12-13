@extends('layouts.account')

@section('title')
    Account - Dashboard
@endsection

@section('content')
    <div>
      <h1>Edit Project</h1>
      <h6>Add a new project</h6>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
              
            <div class="row">
              <div class="col-md-10">
                <form action="/account/projects/{{ $project->id }}" method="POST">
                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <label for="title">Title</label><br>
                      <input type="text" name="title" value="{{ $project->title }}" id="">
                    </div>
                  </div>
                  <div class="img-section">
                    <div class="row">
                      @foreach ($project->inspirations as $inspiration)
                        <div class="col-md-3">
                          <div class="box" style="margin: 1rem">
                            <div
                              style="position: relative; background: url('{{ $inspiration->image_url }}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                            </div>
                            <a href="/projects/inspiration/{{$inspiration->image_info}}/delete" class="delete-inspiration">
                              <i class="fa fa-trash"></i>
                            </a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <button type="submit" class="btn">Save</button>
                </form>
              </div>
              <div class="col-md-2">
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
