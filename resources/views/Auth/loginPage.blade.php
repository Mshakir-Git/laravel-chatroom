@extends('layout.app')

@section('content')


    <form action="{{url()->current()}}" method="POST" class="mx-auto mt-3" style="width:300px">
        @csrf
        <br>
        <br>
        <br>
        <h1 class="d-block">
            LogIn
        </h1>



        <div class="form-group">
          @if(session("status"))
          <h5 class="text-danger border border-danger rounded p-3">{{session("status")}}</h5><br>
          @endif
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


        <div class="form-check">
          <input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div>
        <br>

        <button type="submit" class="btn btn-primary mr-2">LogIn</button> or <a href="{{route('register')}}">Register</a>
      </form>
@endsection