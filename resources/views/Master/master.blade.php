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

      @auth
      <!-- Yield Navbar -->
      @yield('nav')
      @endauth

      @guest
      <div class="collapse navbar-collapse " id="navbar-list-4">
         <ul class="navbar-nav ml-auto mr-1">
            <a type="button" href="#" class="btn btn-success" data-target="#login" data-toggle="modal" style="color: white; margin-right:5%">Login</a>
            <a type="button" href="#" class="btn btn-success" data-target="#register" data-toggle="modal" style="color: white;">Register</a>
         </ul>
      </div>
      @endguest

   </nav>

   <div id="fullpage">
      @guest
      <div class="section BG1" id="section2">
         <div class="container">
            <h1 style="color:darkmagenta;">Welcome to KueMunLue Wittayakom Website</h1>
            <h2 style="color:darkmagenta;">Please Login to access the website :)</h2>
         </div>
      </div>
      @endguest

      @auth

      @yield('section')
      <!-- Yield -->

      @endauth
   </div>

   <!-- Login Form Popup -->
   <div id="login" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <button data-dismiss="modal" class="close">&times;</button>
               <h4 style="color: white;">Login</h4>
               {{ Form::open(array('url' => '/login' ,'method' => 'post','action'=>'LoginController@login')) }}
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
               <h4 style="color: white;">Register</h4>
               {{ Form::open(array('url' => '/student','method'=>'post','action' => 'StudentController@store')) }}
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
                     {{Form::date('regbirthdate','', ['class'=>'datebirth','min'=>'1980-01-01','max'=>'2005-12-31'])}}
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

   @auth
   <!-- Edit Profile form -->
   <div id="editprofile" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <h4 style="color: white;">Edit Profile</h4>
               <form action="/student/update/{{Auth::user()->id}}" method="post">
                  @csrf
                  <div class="row">
                     <div class="col-5">
                        <input type="text" name="editname" class="username form-control" style="background: transparent" placeholder="Name" value="{{Auth::user()->name}}">
                     </div>
                     <div class="col-7">
                        <input type="text" name="editlastname" class="username form-control" style="background: transparent" placeholder="Lastname" value="{{Auth::user()->lastname}}">
                     </div>
                     <div class="col-12">
                        <input type="date" name="editbirthdate" class='datebirth' max='2005-01-01' min='1980-01-01' value={{Auth::user()->birthdate}}>
                     </div>
                     <div class="col-12">
                        <input type="number" name="editphone" class="username form-control" style="background: transparent" placeholder="Phone" value={{Auth::user()->student_phone}}>
                     </div>
                     <div class="col-12">
                        <label for="Profile picture" style="color:white">Profile picture</label>
                        <input type="file" name="image" class="file" accept="image/*">
                     </div>
                     <div class="col-12">
                        <input type="submit" class='btn login' value="Change">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   @endauth

   <!-- Add course form -->
   <div id="addcourse" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <h4 style="color: white;">Add course</h4>
               {{ Form::open(array('url' => '/course','method'=>'post')) }}
               <div class="row">
                  <div class="col-4">
                     {{Form::text('courseid','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Course id'])}}
                  </div>
                  <div class="col-4">
                     {{Form::text('coursename','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Course Name'])}}
                  </div>
                  <div class="col-4">
                     {{Form::text('coursecredit','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Credit'])}}
                  </div>
                  <div class="col-12">
                     {{Form::submit('Add',['class'=>'btn login'])}}
                  </div>
               </div>
               {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>

   <!-- Edit course form -->
   <div id="editcourse" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <h4 style="color: white;">Edit course</h4>
               {{ Form::open(array('url' => '/course/update/1597')) }}
               <div class="row">
                  <div class="col-4">
                     {{Form::text('find','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Which course id'])}}
                  </div>
                  <div class="col-4">
                     {{Form::text('editcoursename','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Change Name to'])}}
                  </div>
                  <div class="col-4">
                     {{Form::text('editcoursecredit','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Change credit to'])}}
                  </div>
                  <div class="col-12">
                     {{Form::submit('Change',['class'=>'btn login'])}}
                  </div>
               </div>
               {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>

   <!-- Edit grade form -->
   <div id="editgrade" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <h4 style="color: white;">Edit Student Grade</h4>
               {{ Form::open(array('url' => '/')) }}
               <div class="row">
                  <div class="col-7">
                     {{Form::text('gradeedit','',['class'=>'username form-control','style'=>'background: transparent;','placeholder'=>'Grade'])}}
                  </div>
                  <div class="col-12">
                     {{Form::submit('Add',['class'=>'btn login'])}}
                  </div>
               </div>
               {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript -->
   @guest
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