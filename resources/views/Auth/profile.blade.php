@extends('layout.app')

@section('content')
<br>
<br>
<br>
<br>
@auth
<div class="d-flex mt-5" style="flex-direction: column;align-items: center;">
    @if (auth()->user()->picture)
    <img style="width:200px;height:200px;" src="../storage/app/{{auth()->user()->picture}}" alt="">
  @else
     <div style="width:200px;height:200px;font-size:100px;display:flex;justify-content: center;" class='msg-username'>{{strtoupper(substr(auth()->user()->username,0,1))}}</div>
  @endif

<br>
<h1>{{auth()->user()->username}}</h1>  
<br>
<h3>{{auth()->user()->email}}</h3>   
</div>
@endauth

    
@endsection