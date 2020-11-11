@extends('Master.master')

@section('title','Admin Page')

@section('nav')
<div class="collapse navbar-collapse " id="navbar-list-4">
   <ul class="navbar-nav ml-auto mr-1">
      <h6 style="margin:auto auto">Admin</h6>
      <li class="nav-item dropdown ">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="50" height="50" class="rounded-circle">
         </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" data-target="#editprofile" data-toggle="modal">Edit Profile</a>
            <a class="dropdown-item" href="/logout">Log Out</a>
         </div>
      </li>
   </ul>
</div>
@endsection

@section('section')
<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Approve</h1>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">name</th>
               <th scope="col">email</th>
               {{-- <th scope="col">phone</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th> --}}
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($data as $item)
            <tr>
               <th scope="row">{{$item->id}}</th>
               <td>{{$item->name}}</td>
               <td>{{$item->email}}</td>
               {{-- <td>{{$item->phone}}</td>
               <td>{{$item->gender}}</td>
               <td>{{$item->age}}</td> --}}
               <td>
                  <div class='row'>
                     <a href="{{ route('admin.edit',$item->id) }}" style="margin-right: 3%;">
                        <button class="btn btn-primary">approve</button>
                     </a>
                     <a href="{{ route('admin.destroy',['id'=>$item->id])}}">
                        <button class="btn btn-danger">reject</button>
                     </a>
                  </div>
               </td>
            </tr>
            @endforeach
            {{-- {{ route('admin.destroy',['id'=>$item->id])}} --}}
         </tbody>
      </table>
   </div>
</div>

<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Course</h1>
         </div>
         <div class="col-3" style="text-align: end;margin-top:1.5%">
            <!--  {{Form::open(array('url' => '/'))}} -->
            {{Form::submit('Add Course',['class'=>'btn btn-success','data-target'=>'#addcourse', 'data-toggle'=>'modal'])}}
            <!--  {{Form::close()}} -->
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Course ID</th>
               <th scope="col">Course Name</th>
               <th scope="col">Credit</th>
               <th scope="col">Operation</th>
            </tr>
         </thead>

         <tbody>
            @foreach($Course as $item)
            <tr>
               <th scope="row">{{$item->course_id}}</th>
               <td>{{$item->course_name}}</td>
               <td>{{$item->credit}}</td>
               <td>
                  <div class="row">
                     <form action="#edit" method="post" style="margin-right: 3%;">
                        <input type="hidden" name="course_id" value="{{$item->course_id}}" />
                        <input type="button" value="Edit" class="btn btn-primary" data-target="#editcourse" data-toggle="modal">
                     </form>
                     <form action="/course/delete/{{$item->course_id}}" method="get">
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('You sure to delete this course');" />
                     </form>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>


<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Grade</h1>
            <p>{{$log}}</p>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">name</th>
               <th scope="col">email</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($dataGrade as $item)
            <tr>
               <th scope="row">{{$item->id}}</th>
               <td>{{$item->name}}</td>
               <td>{{$item->email}}</td>
               <td>
                  <div class="row">
                     <a href="{{ route('admin.show',$item->id) }}"><button class="btn btn-primary">grade</button></a>
                     <a href="/admin/calGrade/{{$item->id}}"><button class="btn btn-success">Cal GPA</button></a>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>

<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Student</h1>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Student ID</th>
               <th scope="col">Name</th>
               <th scope="col">Lastname</th>
               <th scope="col">Username</th>
               <th scope="col">Phone</th>
               <th scope="col">Gender</th>
               <th scope="col">Grade</th>
               <th scope="col">Operation</th>
            </tr>
         </thead>
         <tbody>
            @foreach($apStudent as $item)
            <tr>
               <th scope="row">{{$item->id}}</th>
               <td>{{$item->name}}</td>
               <td>{{$item->lastname}}</td>
               <td>{{$item->email}}</td>
               <td>{{$item->student_phone}}</td>
               <td>{{$item->gender}}</td>
               <td>{{$item->gpa}}</td>
               <td>
                  <div class="row">
                     <form action="/student/delete/{{$item->id}}" method="get">
                        <input type="submit" value="Delete" class="btn btn-danger" onclick='return confirm("Delete or not?");'>
                     </form>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>




<script type="text/javascript">
   var myFullpage = new fullpage('#fullpage', {
      /* sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'], */
      anchors: ['1', '2', '3', '4'],
      navigation: true,
      navigationTooltips: ['Approve', 'Course', 'Grade', 'Student'],
      showActiveTooltip: true,
      menu: '#menu'
   });
</script>

@endsection