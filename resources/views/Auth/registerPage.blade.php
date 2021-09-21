@extends('layout.app')

@section('content')


    <form action="{{url()->current()}}" method="POST" class="mx-auto mt-3" style="width:300px" enctype="multipart/form-data">
        @csrf
        <br>
        <br>
        <br>
        <h1 class="d-block">
            Register
        </h1>

        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control @error('username') border border-danger @enderror" id="username" name="username" placeholder="Enter Username">
            @error('username')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control @error('email') border border-danger @enderror" id="email" name="email" placeholder="Enter email">
            @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
          
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control @error('pass') border border-danger @enderror" id="pass" name="pass" placeholder="Password">
          @error('pass')
          <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control  @error('pass') border border-danger @enderror" id="pass_confirmation" name="pass_confirmation" placeholder="Confirm Password">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Profile Picture</label>
            <input type="file" accept="image/*" class="form-control" id="image" name="image" placeholder="Profole picture">
          </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Register</button>
      </form>
@endsection