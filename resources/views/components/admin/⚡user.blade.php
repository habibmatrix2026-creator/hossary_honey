<?php

use Livewire\Component;
use App\Models\User;
new class extends Component
{
    public $users,$query;
    //start updatedQuery function
    public function updatedQuery()
    {
        $this->loadUsers();
    }
    //end updatedQuery function
    //start load user function
    public function loadUsers()
    {
        $this->users = User::where("name","like","%".$this->query."%")
        ->orWhere("phone_number","like","%".$this->query."%")->get();
    }
    //end load user function
    //start mount function
    public function mount(){
        $this->loadUsers();
    }
    //end mount function
    //start switch function
    public function switch($id,$type)
    {
        $user = User::findOrFail($id);
        $user->user_type=$type;
        $user->save();
        $this->loadUsers();
    }
    //end switch function
    //start delete function
    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();
    }
    //end delete function
};
?>

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <div>
                <h1 class="h3 mb-1">users</h1>
              </div>
            </div>
          </div>


            @if (session()->has('success'))
    <div
        class="alert alert-success"
        x-data
        x-init="setTimeout(() => $wire.reset_session(), 2500)"
    >
        {{ session('success') }}
    </div>
@endif

        </div>
<!--  -->
          <section class="panel">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table" >
                    </i><span>Users Table</span></h2>
                </div>
                <input class="form-control form-control-sm table-search" type="search"
                wire:model.live="query"
                placeholder="Search Users">
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="ordersTable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>phone number</th>
                        <th>email</th>
                        <th>address</th>
                        <th>user type</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
             @foreach ($users as $u)

             <tr>
              <td>{{$u->id}}</td>
              <td>{{$u->name}}</td>
              <td>{{$u->phone_number}}</td>
              <td>{{$u->email}}</td>
              <td>{{$u->address}}</td>
              <td>{{$u->user_type}}</td>
            @if($u->id!=1)
            <td>
                <button class="btn btn-{{ $u->user_type=="admin"?"warning":"success" }}"
                wire:click="switch({{ $u->id }},'{{$u->user_type=="admin"?"user":"admin"}}')"
                >
                    switch {{$u->user_type=="admin"?"user":"admin"}}</button>
                <button class="btn btn-danger" wire:click="delete({{ $u->id }})">delete</button>
              </td>
              @else
             <td>no action</td>
             @endif
             </tr>
             @endforeach

            </tbody>
        </table>
         </div>
          </section>

        <!--  -->
      </main>
