@extends("layout.mainlayout")
@section("main")
<div class="card bg-light">
@if(session('success'))
          <div class="alert alert-success">
               {{ session('success') }}
          </div>
     @endif
     <article class="card-body mx-auto" style="max-width: 400px;">
          <h4 class="cart-title mt-3 text-center">Create Account</h4>
          <p class="text-center">Get Started with your free Account</p>
          <p>
               <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i> Login Via gmail</a>
               <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i> Login via Facebook</a>
          </p>
          <p class="divider-text">
               <span class="bg-light">OR</span>
          </p>
          <form action="register" method="POST" enctype="multipart/form-data">
               @csrf
               <span class="text-danger">
                    @error("name")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text" value="{{old('name')}}">
               </div>
               <span class="text-danger">
                    @error("email")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" value="{{old('email')}}">
               </div>
               <span class="text-danger">
                    @error("phone")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input name="phone" class="form-control" placeholder="Phone number" type="text" value="{{old('phone')}}">
               </div>
               <span class="text-danger">
                    @error("password")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Create password" type="password" value="">
               </div>
               <span class="text-danger">
                    @error("role")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                    </div>
                    <select name="role" class="form-control" id="role">
                         <option hidden>Select your Role</option>
                         <option value="hr" {{ old('role') == 'hr' ? 'selected' : '' }}>HR</option>
                         <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                    </select>
               </div>
               <span class="text-danger">
                    @error("gender")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group " style="border: 1px solid rgba(0, 0, 0, 0.2); border-radius: 5px; padding-left:10px; padding-top: 3px">
                    <label for="gender">Gender :</label>
                    <div class="form-check form-check-inline" style="padding-left: 5px;">
                         <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                         <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline" style="padding-left: 5px;">
                         <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                         <label class="form-check-label" for="female">Female</label>
                    </div>
               </div>
               <span class="text-danger">
                    @error("deptid")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-building-o"></i></span>
                    </div>
                    <select name="deptid" class="form-control" id="deptid">
                         <option hidden>Select Depatement</option>
                         @foreach ($dept as $d)
                              <option value="{{$d->dept_id}}">{{$d->deptname}}</option>
                         @endforeach    
                    </select>
               </div>
               <span class="text-danger">
                    @error("photo")
                         {{$message}}
                    @enderror
               </span>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-image"></i></span>
                    </div>
                    <input name="photo" class="form-control" type="file">
               </div>
               <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
               </div>
               <p class="text-center">Have an Account ?<a href="{{url('/login')}}">Log In</a></p>
          </form>
     </article>
</div>

@endsection