<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title??"Page"}}</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .msg-other{
            width:fit-content;
            background-color: chartreuse;
            border-radius: 5px;
            padding: 4px 10px 3px 4px;
            max-width:250px;
            overflow: hidden;
            word-wrap:break-word;
        }
        #chat{
            display:flex;
            flex-direction:column;
        }
        .msg-mine{
            width:fit-content;
            background-color: rgb(0, 195, 255);
            border-radius: 5px;
            padding: 4px 10px 3px 4px;
            place-self: flex-end;
            /*margin-left:400px;*/
            max-width:250px;
            overflow: hidden;
            word-wrap:break-word;
        }
        .msg-username{
            display: inline-block;
            width:23px;
            background-color: white;
            height: 23px;
            border-radius: 10px;
            padding: 1px 1px 1px 1px;
            margin-right:6px;
            text-align:center;
        }
        .text{
            border-radius: 5px;
            width:80%;
            height:23px;
        }
        .send{
            border-radius: 10px;
            width:27px;
            height:27px;
            background-color: rgb(0, 195, 255); 
        }
        form.main{
            background:#4967fa;
            position: fixed;
            top:94%;
            width:100vw;
            padding: 4px;
            left:0px;
            padding-bottom:13px;
            
        }
        body{
           /* background-color:black;*/
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route("home")}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("register")}}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <!-- Right -->
          <ul class="navbar-nav  ml-auto">
              @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route("login")}}">{{auth()->user()->username}}</a>
                </li>
                <li class="nav-item">
                    <form action="{{route("logout")}}" method="post">@csrf<input class="nav-link bg-transparent border-0" type="submit" value="LogOut"></form>
                </li>
              @endauth

              @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route("login")}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("register")}}">Register</a>
                </li>      
              @endguest
  
         </ul>

        </div>
        
            
      </nav>


    @yield('content')


</body>
</html>