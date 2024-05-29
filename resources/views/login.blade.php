@extends("layout.mainlayout")
@section("main")
<div class="card bg-light py-4">
     @if(session('success'))
          <div class="alert alert-success">
               {{ session('success') }}
          </div>
     @endif
     @if(session('notactive'))
          <div class="alert alert-warning">
               {{ session('notactive') }}
          </div>
     @endif
     @if(session('notsuccess'))
          <div class="alert alert-warning">
               {{ session('notsuccess') }}
          </div>
     @endif
     @if(session('loginfirst'))
          <div class="alert alert-danger">
               {{ session('loginfirst') }}
          </div>
     @endif
     <article class="card-body mx-auto" style="max-width: 400px;">
          <h4 class="cart-title mt-3 text-center">Login Account</h4>
          <p class="text-center">Get Started with your free Account</p>
          <p>
               <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i> Login Via gmail</a>
               <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i> Login via Facebook</a>
          </p>
          <p class="divider-text">
               <span class="bg-light">OR</span>
          </p>
          <form action="" method="POST">
               @csrf
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" required>
               </div>
               <div class="form-group input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Enter password" type="password" value="" required>
               </div>
               <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">LogIn</button>
               </div>
               <p class="text-center">Not Have an Account ?<a href="{{url('/register')}}">SingUp</a></p>
          </form>
     </article>
</div>

@endsection