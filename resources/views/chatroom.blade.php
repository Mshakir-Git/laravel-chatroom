@extends('layout.app')

@section('content')

<div id="chat" class="mx-auto mt-3" style="width:300px">

@foreach ($chat as $row)
    @if ($row->username==auth()->user()->username)
       <div class="msg-mine mb-1"> 
          @if ($pictures[$row->username])
             <img class='msg-username' src="../storage/app/{{$pictures[$row->username]}}" alt="">
           @else
           <div class='msg-username'>{{strtoupper(substr($row->username,0,1))}}</div>
           @endif

           {{$row->msg}}
        </div>
    @else
        <div class="msg-other mb-1">
          @if ($pictures[$row->username])
            <img class='msg-username' src="../storage/app/{{$pictures[$row->username]}}" alt="">
          @else
             <div class='msg-username'>{{strtoupper(substr($row->username,0,1))}}</div>
          @endif

            {{$row->msg}}
        </div>
    @endif
    
@endforeach

</div>
<form action="{{url()->current()}}/add" method="POST" class="mx-auto mt-3" style="width:300px">
    @csrf
    <br>
    <br>
    <br>
    <h1 class="d-block">
        Chat
    </h1>





    <div class="form-group">
      <input type="text" class="form-control" id="msg" name="msg" placeholder="text">

    </div>



    <button type="submit" class="btn btn-primary">>></button>
  </form>

@endsection