@extends('layouts.account')

@section('title')
    Account - Add Project
@endsection

@section('content')
    <div>
      <h1>Create Project</h1>
      <h6>Add a new project</h6>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="row">
              <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <form action="/account/projects" method="POST">
                      @csrf
                      <label for="title">Title</label><br>
                      <input type="text" name="title" id="">
                      <label for="active">Active</label><br>
                      <select name="active">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                      </select>
                      <button type="submit" class="btn">Save</button>
                    </form>
                  </div>
                </div>
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
