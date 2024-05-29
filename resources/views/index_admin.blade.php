@extends("layout.adminlayout")
@section("admin")


<div class="personal-container" style="width: 40%;  margin-left: 30%;">
     <img src="{{asset('/images/'.Session::get('photo'))}}" alt="profile" class="personal-photo">
     <p class="profile-text">
          <span style="margin-left:25%;" class="profile-heading">I am Admin </span><br>
          <span class="profile-heading">Full Name : </span> <span class="profile-sub-heading">{{Session::get("name")}}</span><br>
          <span class="profile-heading">Email : </span> <span class="profile-sub-heading">{{Session::get("email")}}</span><br>
          <span class="profile-heading">Phone Number : </span> <span class="profile-sub-heading">{{Session::get("phone")}}</span><br>
          <span class="profile-heading">Employee Id : </span> <span class="profile-sub-heading">{{Session::get("empid")}}</span><br>
          <span class="profile-heading">Role : </span> <span class="profile-sub-heading">{{Session::get("role")}}</span><br>
          <span class="profile-heading">Gender : </span><span class="profile-sub-heading">{{Session::get("gender")}}</span><br>
          <span class="profile-heading">Status : </span><span class="profile-sub-heading">{{Session::get("status")}}</span><br>
          <a href="#" class="l-edit-btn">
               <button type="button" class="btn btn-primary me-2">Chenge password</button>
          </a>
          <a href="#" class="r-edit-btn">
               <button type="button" class="btn btn-primary">Edit Details</button>
          </a>
     </p>
</div>
@endsection