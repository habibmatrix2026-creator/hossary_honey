<?php

use Livewire\Component;

new class extends Component
{

};
?>

   <nav class="sidebar-nav">
        <a class="nav-link active" href="index.html" aria-current="page">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>

         <a class="nav-link" href="{{ route("goHome") }}" aria-current="page">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">view website</span>
        </a>

        <a class="nav-link" href="{{ route('user')}}" wire:navigate>
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Users</span>
        </a>

          <a class="nav-link" href="{{ route("category") }}" wire:navigate>
          <span class=" nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Category</span>
        </a>

           <a class="nav-link" href="{{ route("product") }}" wire:navigate>
          <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Product</span>
        </a>

                <a class="nav-link" href="{{ route("order") }}" wire:navigate>
          <span class=" nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Order</span>
        </a>

        <a class="nav-link" href="{{ route("order_item") }}" wire:navigate>
          <span class=" nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">Order Item</span>
        </a>

           <a class="nav-link" href="{{ route('profile.show') }}">
          <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
          <span class="nav-text">profile</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="nav-link">
                 @csrf
                 <span class="nav-icon"><i class="arrow-right-from-bracket"></i></span>
                 <span class="nav-text"><input type="submit"  value="Logout" class="btn" value="sign Out"></span>

            </form>


      </nav>
