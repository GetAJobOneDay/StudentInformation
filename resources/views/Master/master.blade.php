<!doctype html>
<html lang="en">

<head>
   <title>@yield('title')</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <!-- CSS -->
   <link href="{{asset('/css/app.css')}}" rel="stylesheet">
   <link href="{{asset('/css/OPScroll.css')}}" rel="stylesheet">

   <!-- JS -->
   <script src="{{asset('/js/OPScroll.js')}}"></script>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
      <ul id="MiniLeftNav">
         <a class="navbar-brand" href="/">
            <img src="{{asset('/pic/icon.png')}}" width="60" height="60" class="rounded-circle">
            <b>
               <span>KueMunLue Wittayakom</span>
            </b>
         </a>
      </ul>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      @guest
      <div class="collapse navbar-collapse " id="navbar-list-4">
         <ul class="navbar-nav ml-auto mr-1">
            <h6 style="margin:auto auto">Username</h6>
            <li class="nav-item dropdown ">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="50" height="50" class="rounded-circle">
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Edit Profile</a>
                  <a class="dropdown-item" href="#">Log Out</a>
               </div>
            </li>
         </ul>
      </div>
      @endguest

      @auth
      <div class="collapse navbar-collapse " id="navbar-list-4">
         <ul class="navbar-nav ml-auto mr-1">
            <a type="button" href="#" class="btn btn-success" data-target="#login" data-toggle="modal" style="color: white; margin-right:5%">Login</a>
            <a type="button" href="#" class="btn btn-success" data-target="#register" data-toggle="modal" style="color: white;">Register</a>
         </ul>
      </div>
      @endauth

   </nav>

   <div id="fullpage">

      <!-- <div class="section" id="section1">
         <div class="slide BG1">
            <div class="container">
               <h1>Simple Demo</h1>
            </div>
         </div>
         <div class="slide active">
            <div class="container">
               <h1>Only text</h1>
            </div>
         </div>
         <div class="slide">
            <div class="container">
               <h1>And text</h1>
            </div>
         </div>
         <div class="slide">
            <div class="container">
               <h1>And more text</h1>
            </div>
         </div>
      </div> -->

      @auth
      <div class="section BG1" id="section">
         <div class="container">
            <h1 style="color:darkmagenta;">Welcome to KueMunLue Wittayakom Website</h1>
            <h2 style="color:darkmagenta;">Please Login to access the website :)</h2>
         </div>
      </div>
      @endauth

      @guest

      @yield('section')
      <!-- Yield -->

      @endguest
   </div>

   <!-- Login Form Popup -->
   <div id="login" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <button data-dismiss="modal" class="close">&times;</button>
               <h4>Login</h4>
               {{ Form::open(array('url' => '/')) }}
               <div class="row">
                  <div class="col-12">
                     {{Form::text('username','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Username'])}}
                  </div>
                  <div class="col-12">
                     {{Form::password('password',['class'=>'password form-control','id'=>'Password','style'=>'background: transparent;','placeholder'=>'Password'])}}
                  </div>
                  <div class="col-12">
                     {{Form::submit('Login',['class'=>'btn login'])}}
                  </div>
               </div>
               {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>

   <!-- Register Form Popup -->
   <div id="register" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <button data-dismiss="modal" class="close">&times;</button>
               <h4>Register</h4>
               {{ Form::open(array('url' => '/')) }}
               <div class="row">
                  <div class="col-5">
                     {{Form::text('regname','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Name'])}}
                  </div>
                  <div class="col-7">
                     {{Form::text('reglastname','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Lastname'])}}
                  </div>
                  <div class="col-12">
                     {{Form::text('regusername','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Username'])}}
                  </div>
                  <div class="col-12">
                     {{Form::password('regpassword',['class'=>'password form-control','id'=>'Password','style'=>'background: transparent;','placeholder'=>'Password'])}}
                  </div>
                  <div class="col-12">
                     {{Form::select('Gender', ['Male' => 'Male', 'Female' => 'Female'])}}
                     {{Form::date('regbirthdate', \Carbon\Carbon::now(),['class'=>'datebirth'])}}
                  </div>
                  <div class="col-12">
                     {{Form::number('regphone','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Phone'])}}
                  </div>
                  <div class="col-12">
                     {{Form::label('Profile picture','',['style'=>'color:white'])}}
                     {{Form::file('image',['class'=>'file','accept'=>'image/*'])}}
                  </div>
                  <div class="col-12">
                     {{Form::submit('Register',['class'=>'btn login'])}}
                  </div>
               </div>
               {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript -->
   @auth
   <script type="text/javascript">
      var myFullpage = new fullpage('#fullpage', {
         /* sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'], */
         anchors: ['firstPage'],
         navigation: true,
         navigationTooltips: ['Welcome'],
         showActiveTooltip: true,
         menu: '#menu'
      });
   </script>
   @endauth

   @guest
   <script type="text/javascript">
      var myFullpage = new fullpage('#fullpage', {
         /* sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'], */
         anchors: ['firstPage', 'secondPage'],
         navigation: true,
         navigationTooltips: ['Profile', 'Course'],
         showActiveTooltip: true,
         menu: '#menu'
      });
   </script>
   @endguest

   <script>
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
         var currentScrollPos = window.pageYOffset;
         if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
         } else {
            document.getElementById("navbar").style.top = "-50px";
         }
         prevScrollpos = currentScrollPos;
      }
   </script>

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://kit.fontawesome.com/yourcode.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>


</html>