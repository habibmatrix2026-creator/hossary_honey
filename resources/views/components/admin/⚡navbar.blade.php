<?php
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
new class extends Component
{

};
?>

  <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>



          <div class="navbar-actions ms-auto">
            <!-- <button class="icon-button theme-toggle" type="button" data-theme-toggle
            aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="false"></i>
            </button> -->


            <!-- <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" >
                <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
              </button>



              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                     <form method="POST" action="{{ route('logout') }}">
                            @csrf
                          <input type="submit"  value="Logout" class="dropdown-item" value="sign Out">
                        </form>

                </li>
              </ul>
            </div> -->
          </div>
        </div>
      </nav>
