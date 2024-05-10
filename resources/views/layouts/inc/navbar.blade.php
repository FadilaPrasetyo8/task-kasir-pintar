 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
     navbar-scroll="true">
     <div class="container-fluid py-1 px-3 d-flex">

         <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 float-right d-flex justify-content-between"
             id="navbar">
             <div class=""><a href="" class="nav-link text-body p-0" id="iconNavbarSidenav">
                     <div class="sidenav-toggler-inner">
                         <i class="sidenav-toggler-line"></i>
                         <i class="sidenav-toggler-line"></i>
                         <i class="sidenav-toggler-line"></i>
                     </div>
                 </a></div>
             <ul class="navbar-nav  justify-content-end">

                 <li class="nav-item d-flex align-items-center">

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                     <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fa fa-user me-sm-1"></i>
                         <span class="d-sm-inline d-none">Sign Out</span>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
