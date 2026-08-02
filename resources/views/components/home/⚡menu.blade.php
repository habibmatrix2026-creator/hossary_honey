<?php

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
new class extends Component
{
    public $category,$product,$class="all",$quantity=[],$selectedWeight = [];
    //start filter function
    public function filter($id,$title)
    {
        $this->class=$title;
        if($id==0)
            {
              $this->loadProducts();
              return;
            }
         $this->product=Product::with(['category'])->where("category_id",$id)->get();
    }
    //end filter function
    //start mount function
    public function mount()
    {
          $this->loadCategories();
          $this->loadProducts();
    }
    //end mount function
    //start loadProducts function
     public function loadProducts()
    {
        $this->product = Product::with(['category'])->get();
    }
    //end loadProducts function
    //start loadCategory function
    public function loadCategories()
    {
        $this->category = Category::all();
    }
    //end loadCategory function
    //start add to cart function
    public function add_cart($product_id,$weight)
    {
        if(!Auth::check())
             return redirect()->route('login');
       $this->validate([
        "quantity.$product_id"=>['required', 'integer', 'min:1']
       ]);
       $check_price1=Product::where("id",$product_id)->first();
       $cartItem = Cart::where('product_id',$product_id)->where("user_id",Auth::id())
       ->where("weight",$weight)->first();
       if(!$cartItem)
        {
             Cart::create(
            [
         'user_id' => Auth::id(),
        'product_id' => $product_id,
        'quantity' => $this->quantity[$product_id],
        'weight'     => $check_price1->price1?($this->selectedWeight[$product_id]??800):1,
            ]
            );
        }
        else
           { $cartItem->quantity += $this->quantity[$product_id];
            $cartItem->save();}
             session()->flash('success','تمت اضافة المنتج الى السلة');
             $this->quantity[$product_id] = null;
    }
    //end add to cart function
      //start reset session function
       public function reset_session()
    {
        session()->forget('success');
    }
    //end reset session function
    //start get price function
public function getPrice($productId, $weight)
{
    $this->selectedWeight[$productId] = $weight;
}
    //end get price function
};
?>

<div>

 <section id="menu">
         <div class="container">
            <div class="text-center mb-5" >

               <h2 class="stitle">منتجاتنا <span>المميزة</span></h2>
               <div class="sline"></div>
            </div>
            <!-- FIX 3 � filter buttons -->
            <div class="text-center mb-4" >
               <button class="hbfiltbtn {{$class=="all"?"active":""}}"
               wire:click="filter(0,'all')">الكل</button>
               @foreach ($category as $c)
              <button class="hbfiltbtn {{$class==$c->title?"active":""}}"
              wire:click="filter({{ $c->id }},'{{ $c->title }}')">{{ $c->title }}</button>
               @endforeach
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
            <div class="row g-4" id="mgrid">
               <!-- CARD 1: Burgers -->
                 @foreach ($product as $p)
               <div class="col-sm-6 col-lg-4 mwrap" >
          <div class="mcard">
                     <div class="mimg">
                        <img src="{{ Storage::url($p->image) }}" alt="Smash Burger"/>
                     </div>
                     <div class="mbody">
                        <div class="mcat">{{ $p->category->title }}</div>
                        <div class="mtit">{{ $p->title }}</div>
                        <div class="mdesc">{{ $p->details }}</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">
                                @php
                                    $weight = $selectedWeight[$p->id] ?? 800;
                                @endphp

                                @if($weight == 800)
                                    {{ $p->price }} $
                                @else
                                    {{ $p->price1 }} $
                                @endif

                            </div>
                            @if ($p->price1)
 <div>
                                <button
    class="hbfiltbtn {{ ($selectedWeight[$p->id] ?? 800) == 800 ? 'active' : '' }}"
    wire:click="getPrice({{ $p->id }},800)">
    800g
</button>

<button
    class="hbfiltbtn {{ ($selectedWeight[$p->id] ?? 800) == 400 ? 'active' : '' }}"
    wire:click="getPrice({{ $p->id }},400)">
    400g
</button>
                              </div>
                            @endif

                              <div>
                                  <input type="number"
                            placeholder="الكمية" min="1"
                            class="form-control form-control-sm" wire:model="quantity.{{ $p->id }}">
                              @error("quantity.$p->id")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                        </div>
                           </div>

                           <button class="madd" title="الاضافة الى السلة"
                           wire:loading.attr="disabled"
                           wire:click="add_cart({{ $p->id }},{{ $weight }})">
                            <i class="fas fa-plus"></i>
                        </button>
                        </div>
                     </div>
                  </div>
                   </div>
                @endforeach



            </div>
            <!-- end #mgrid -->

         </div>
      </section>

</div>
