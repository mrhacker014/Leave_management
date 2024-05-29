@extends("layout.employeelayout")
@section("employee")
<div class="card bg-light">
     <article class="card-body mx-auto" style="max-width: 400px;">
          <h4 class="cart-title mt-3 text-center">Update Profile</h4>
          <form action="{{URL('/Dashbord/profile/update', $update->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text" value="{{$update->name}}">
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" value="{{$update->email}}">
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input name="phone" class="form-control" placeholder="Phone number" type="text" value="{{$update->phone}}">
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    </div>
                    <input name="role" class="form-control" placeholder="Select your Role" type="text" value="{{$update->role}}" readonly>
               </div>
               <!-- <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    </div>
                    <select name="role" class="form-control" id="role" readonly>
                         <option hidden>Select your Role</option>
                         <option value="hr" {{ $update->role === 'hr' ? 'selected' : '' }}>HR</option>
                         <option value="employee" {{ $update->role === 'employee' ? 'selected' : '' }}>Employee</option>
                    </select>
               </div> -->
               <div class="form-group " style="border: 1px solid rgba(0, 0, 0, 0.2); border-radius: 5px; padding-left:10px; padding-top: 3px">
                    <label for="gender">Gender :</label>
                    <div class="form-check form-check-inline" style="padding-left: 5px;">
                         <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ $update->gender === 'male' ? 'checked' : ''}}>
                         <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline" style="padding-left: 5px;">
                         <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ $update->gender === 'female' ? 'checked' : ''}}>
                         <label class="form-check-label" for="female">Female</label>
                    </div>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-building-o"></i></span>
                    </div>
                    <select name="deptid" class="form-control" id="deptid">
                         <option hidden>Select Depatement</option>
                         @foreach ($dept as $d)
                         <option value="{{ $d->dept_id}}" {{ $d->dept_id == $update->deptid ? 'selected' : '' }}>{{$d->deptname}}</option>
                         @endforeach
                    </select>
               </div>
               <span style="color: green;">not update photo ! Please don't click </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-image"></i></span>
                    </div>
                    <input name="photo" class="form-control" type="file">
               </div>
               <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
               </div>
          </form>
     </article>
</div>
@endsection