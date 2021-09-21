@extends('layout.app')

@section('content')

<div id="chat" class="mx-auto mt-5" style="width:300px">
    <br>
    <br>
  

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
<br>
<br>
<br>
<form action="{{url()->current()}}/add" method="POST" class="form-inline mx-auto p-2 fixed-bottom bg-dark" >
    @csrf

    <div class="form-group d-inline mb-0">
      <input type="text" class="form-control" id="msg" name="msg" placeholder="text"  style="min-width:72vw">

    </div>


    <div class="form-group d-inline mb-0">
    <button type="submit" class="btn btn-primary ml-1" style="min-width:2vw">>></button>
</div>
  </form>

@endsection