<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>


   <nav class="navbar navbar-expand-lg" id="nav">
         <div class="container">
            <a class="navbar-brand" href="#">
               <div class="blogo">
                <img src="home/img/logo.png" width="80" height="80">
               </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <i class="fas fa-bars" style="color:var(--primary);font-size:1.35rem;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
               <ul class="navbar-nav mx-auto">
                  <li class="nav-item"><a class="nav-link active" href="#hero">الرئيسية</a></li>
                  <li class="nav-item"><a class="nav-link" href="#menu">قائمة منتجاتنا</a></li>
<!--  -->
               <li class="nav-item dropdown">
                  @if (Route::has('login'))

    @auth
    <!-- <li><a href="{{ url('/dashboard') }}">Dashboard</a></li> -->
    <li class="nav-item dropdown">
        <a  href="#"
       id="userDropdown"
       role="button"
       data-bs-toggle="dropdown"
       class="nav-link"
       aria-expanded="false">
            <span>{{ Auth::user()->name }}</span>
    <i class="bi bi-chevron-down toggle-dropdown"></i>
</a>
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
                     @if (Auth::user()->user_type=='admin')
 <li><a class="dropdown-item" href="{{route('admin_dashboard')}}">dashboard</a></li>
                     @endif

                <li ><a class="dropdown-item" href="{{ route('profile.show') }}" >profile</a></li>
                <li>
               <form method="POST" action="{{ route('logout') }}">
                            @csrf
                          <input type="submit"  value="Logout" class="btn btn-danger dropdown-item">
                        </form>
                    </li>

         </ul>
        </li>
        <li><a href="{{ route("cart") }}" style="color:black" class="nav-link"><i class="bi bi-cart"></i></a></li>

    @else
    <li><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>


        @if (Route::has('register'))
        <li><a class="nav-link" href="{{ route('register') }}">انشاء حساب</a></li>

        @endif
    @endauth

@endif
               </li>


<!--  -->

            </ul>
            </div>


            </div>

      </nav>

