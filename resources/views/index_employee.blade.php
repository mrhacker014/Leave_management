@extends("layout.employeelayout")
@section("employee")
@if(session('update_success'))
<div class="alert alert-success">
     {{ session('update_success') }}
</div>
@endif
<div class="personal-container">
     <img src="{{asset('/images/'.Session::get('photo'))}}" alt="profile" class="personal-photo">
     <p class="profile-text">
          <span style="margin-left:25%;" class="profile-heading">I am Employee </span><br>
          <span class="profile-heading">Full Name : </span> <span class="profile-sub-heading">{{Session::get("name")}}</span><br>
          <span class="profile-heading">Email : </span> <span class="profile-sub-heading">{{Session::get("email")}}</span><br>
          <span class="profile-heading">Phone Number : </span> <span class="profile-sub-heading">{{Session::get("phone")}}</span><br>
          <span class="profile-heading">Employee Id : </span> <span class="profile-sub-heading">{{Session::get("empid")}}</span><br>
          <span class="profile-heading">Role : </span> <span class="profile-sub-heading">{{Session::get("role")}}</span><br>
          <span class="profile-heading">Department Name : </span><span class="profile-sub-heading">{{Session::get("deptid")}}</span><br>
          <span class="profile-heading">Gender : </span><span class="profile-sub-heading">{{Session::get("gender")}}</span><br>
          <span class="profile-heading">Status : </span><span class="profile-sub-heading">{{Session::get("status")}}</span><br>
          <a href="#" class="l-edit-btn">
               <button type="button" class="btn btn-primary me-2">Chenge password</button>
          </a>
          <a href="{{ URL('/Dashbord/profile/update', Auth::user()->id) }}" class="r-edit-btn">
               <button type="button" class="btn btn-primary">Edit Details</button>
          </a>
     </p>
</div>
@endsection