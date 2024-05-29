<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://kit.fontawesome.com/67f07203cb.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-DuJ7nbPcGvWxWZpi95Uf3TQkth5Rt29z+wnkToN+N2OUtJRJRyF/Ng9QwprpZYm7UxwUIF2VjWkGj4qn0I2Tkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <link rel="stylesheet" href="{{ asset('css/style.css')}}">

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     
     <title>Apply For Leave</title>
</head>

<body>

     <div class="containers">
          <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 pl-4  border-bottom">
               <a href="{{url('/adminDashbord/profile')}}" class="d-flex col-md-2 align-items-center text-dark text-decoration-none">
                    <h3>SSLPL</h3>
               </a>

               <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{url('/adminDashbord/profile')}}" class="nav-link px-2 link-secondary">Profile</a></li>
                    <li><a href="{{url('/adminDashbord/employeeslist')}}" class="nav-link px-2 link-secondary">Employees</a></li>
                    <li><a href="{{url('/adminDashbord/leaveList')}}" class="nav-link px-2 link-secondary">LeaveList</a></li>
               </ul>

               <div class="col-md-2 text-end ">
                    <a href="/logout"> 
                         <button type="button" class="btn btn-outline-danger me-2">Logout</button>
                    </a>
                    <form action="{{ route('delete.account', Auth::user()->id) }}" method="POST" style="margin-left: 42%; margin-top: -20%; padding: -9px;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Are you sure you want to delete your account?')">Delete Acc</button>
                    </form>  
               </div>
          </header>
     </div>

     @yield("admin")

     <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
          <div class="col-md-4 d-flex align-items-center ml-3">
               <a href="/" class="me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <h6>SSLPL</h6>
               </a>
               <span class="text-muted">© 2021 SSLPL, Inc</span>
          </div>

          <ul class="nav col-md-3 justify-content-end d-flex mr-3">
               <li class="list-inline-item"><a class="text-muted" href="#"><i class="fab fa-instagram"></i></a></li>
               <li class="list-inline-item"><a class="text-muted" href="#"><i class="fab fa-linkedin"></i></a></li>
               <li class="list-inline-item"><a class="text-muted" href="#"><i class="fab fa-facebook"></i></a></li>
          </ul>
     </footer>

</body>

</html>