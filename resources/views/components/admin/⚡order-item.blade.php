<?php

use Livewire\Component;
use App\Models\OrderItem;
new class extends Component
{
   public $orderItem,$query;
   //start load order item function
   public function loadOrderItem()
   {
      $this->orderItem=OrderItem::with(['product','order'])
      ->where('order_id',"like","%".$this->query."%")->get();
   }
   //end load order item function
   //start mount function
   public function mount()
   {
    $this->loadOrderItem();
   }
   //end mount function
     //start updatedQuery function
   public function updatedQuery()
   {
    $this->loadOrderItem();
   }
   //end updatedQuery function
   //start delete function
   public function delete($id)
   {
    OrderItem::findOrfail($id)->delete();
   }
   //end delete function

};
?>

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <div>
                <h1 class="h3 mb-1">Order item Table</h1>
              </div>
            </div>
          </div>

          <section class="row g-3">
          </section>
        </div>
<!--  -->
          <section class="panel">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table" >
                    </i><span>Order Items Table</span></h2>
                </div>
                <input class="form-control form-control-sm table-search" type="search"
                wire:model.live="query"
                placeholder="Search Order Item">
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="ordersTable" >
                <thead>
                    <tr>
                     <th>ID</th>
                     <th>order ID</th>
                     <th>product</th>
                     <th>price</th>
                     <th>quantity</th>
                     <th>delete</th>
                    </tr>
                </thead>
                <tbody>
               @foreach ($orderItem as $o)
               <tr>
                  <td>{{$o->id}}</td>
                  <td>{{$o->order_id}}</td>
                  <td>{{$o->product->title}}</td>
                  <td>{{$o->price}}</td>
                  <td>{{$o->quantity}}</td>
                  <td>
                    <button class="btn btn-danger"
                    wire:click="delete({{ $o->id }})">delete</button>
                  </td>
               </tr>
               @endforeach
            </tbody>
        </table>
         </div>
          </section>

        <!--  -->
      </main>
