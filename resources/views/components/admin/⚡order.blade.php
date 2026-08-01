<?php

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
new class extends Component
{
   public $order,$query;
   //start updatedQuery function
   public function updatedQuery()
   {
    $this->loadOrder();
   }
   //end updatedQuery function
   //start load order function
   public function loadOrder()
   {
    $this->order=Order::with(["user"])->where("phone","like","%". $this->query ."%")->get();
   }
   //end load order function
   //start mount function
   public function mount()
   {
    $this->loadOrder();
   }
   //end mount function
   //start done function
   public function done($id)
   {
    $oder=Order::findOrFail($id);
    $oder->status=true;
    $oder->save();
    $this->loadOrder();
   }
   //end done function
   //start delete function
   public function delete($id)
   {
    Order::findOrFail($id)->delete();
     OrderItem::where("order_id",$id)->delete();
   }
   //end delete function
};
?>

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <div>
                <h1 class="h3 mb-1">Order Table</h1>
              </div>
            </div>
          </div>

          <section class="row g-3">
            @if (session()->has('success'))
    <div
        class="alert alert-success"
        x-data
        x-init="setTimeout(() => $wire.reset_session(), 2500)"
    >
        {{ session('success') }}
    </div>
@endif
          </section>
        </div>
<!--  -->
          <section class="panel">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table" >
                    </i><span>Order Table</span></h2>
                </div>
                <input class="form-control form-control-sm table-search" type="search"
                wire:model.live="query"
                placeholder="Search Orders">
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="ordersTable" >
                <thead>
                    <tr>
                     <th>ID</th>
                     <th>name</th>
                     <th>phone</th>
                     <th>address</th>
                     <th>total price</th>
                     <th>status</th>
                     <th>action</th>
                    </tr>
                </thead>
                <tbody>
             @foreach ($order as $o)
             <tr>
             <td>{{$o->id}}</td>
             <td>{{$o->user->name}}</td>
             <td>{{$o->phone}}</td>
             <td>{{$o->address}}</td>
             <td>{{$o->total_price}}</td>
             <td>{{$o->status}}</td>
             <td>
                @if($o->status==0)
                <button class="btn btn-success" wire:click="done({{ $o->id }})">done</button>
                @endif
                <button class="btn btn-danger" wire:click="delete({{ $o->id }})">delete</button>
             </td>
             </tr>
             @endforeach

            </tbody>
        </table>
         </div>
          </section>

        <!--  -->
      </main>
