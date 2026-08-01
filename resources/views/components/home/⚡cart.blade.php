<?php

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $cart;
    //start load cart function
    public function loadCart()
    {
        $this->cart = Cart::with(['product'])->where("user_id", Auth::id())->get();
    }
    //end load cart function
    //start mount function
    public function mount()
    {
        $this->loadCart();
    }
    //end mount function
    //start update quantity
    public function update_quantity($x,$id)
    {

        $cart=Cart::findOrFail($id);

        if($x=="+")
            $cart->quantity +=1;
        else
            {
              $cart->quantity -=1;
                if($cart->quantity < 1)
                    {
                      $cart->delete();
                      $this->loadCart();
                      return;
                    }
            }

          $cart->save();
          $this->loadCart();
    }
    //end update quantity
    //start delete function
    public function delete($id)
    {
      Cart::findOrFail($id)->delete();
    }
    //end delete function
    //start checkout function
    public function checkout($total)
    {
       $order=Order::create([
        'user_id' => Auth::id(),
        'total_price' => $total,
        'phone' => Auth::user()->phone_number,
        'address' => Auth::user()->address,
       ]);
       $cart=Cart::with(['product'])->where("user_id", Auth::id())->get();
        $message = "السلام عليكم و رحمة الله و بركاته\n\n";
        $message.="رقم الطلبية ".$order->id."\n";
       foreach($cart as $item)
        {
            OrderItem::create([
             'order_id' => $order->id,
             'product_id' => $item->product_id,
             'price' => $item->product->price,
             'quantity' => $item->quantity,
            ]);
        $message .= "المنتج: " . $item->product->title . "\n";
        $message .= "الكمية: " . $item->quantity . "\n";
        $message .= " السعر للمنتج الواحد". $item->product->price. " $\n";
        $message .= " السعر الاجمالي لهذا المنتج ". ($item->quantity * $item->product->price) . " $\n";
        $message .= "------------------\n";
            $item->delete();
        }
    $message.="السعر الاجمالي ".$total."$";
    $message .= "\nالزبون: " . Auth::user()->name;
    $message .= "\nرقم الهاتف: " . Auth::user()->phone_number;
    $message .= "\nالعنوان: " . Auth::user()->address;

    $phone = "96176055598"; // رقم المطعم مع كود لبنان

    $whatsappUrl = "https://wa.me/" . $phone . "?text=" . urlencode($message);

    return redirect()->away($whatsappUrl);
    }
    //end checkout function
};
?>

<div class="container">
    <a href="{{ route("goHome") }}"
     class="btn btn-primary"
    >العودة الى الموقع</a>
    <h1>سلة المشتريات</h1>

    <div class="cart-wrapper">
        <!-- Products List Area -->
        <div class="cart-items" id="cart-items-container">
            @php
            $total=0;
            @endphp
           @foreach ($cart as $c)
  <div class="cart-item'">
               <div class="item-details">
                    <div class="item-img" >
                          @if ($c->product->image)
                  <img src="{{ Storage::url($c->product->image) }}" width="70%" alt=""
                        >
                        @else
                        no image
                    @endif
                </div>
                    <div class="item-info">
                        <div class="item-name">{{ $c->product->title }}</div>
                        <div class="item-price">{{ $c->product->price." $"}}</div>
                    </div>
                </div>
                <div class="quantity-controls">
                    <button class="qty-btn" wire:click="update_quantity('-',{{ $c->id }})">-</button>
                    <span class="qty-val">{{$c->quantity}}</span>
                    <button class="qty-btn" wire:click="update_quantity('+',{{ $c->id }})">+</button>
                </div>
                <div class="item-total-section">
                    <span class="item-total-price">{{ $c->quantity*$c->product->price." $" }}</span>
                    <button class="remove-btn" wire:click="delete({{ $c->id }})">Remove</button>
                </div>
            </div>
            @php
            $total+=($c->quantity*$c->product->price);
            @endphp
           @endforeach


        </div>

        <!-- Checkout Pricing Card -->
        <div class="cart-summary">
            <h2 class="summary-title">Order Summary</h2>
            <div class="summary-row">
                <span>المجموع الفرعي</span>
                <span id="summary-subtotal">${{ $total }}</span>
            </div>
            <!-- <div class="summary-row">
                <span>Shipping</span>
                <span id="summary-shipping">$0.00</span>
            </div> -->
            <div class="summary-row total">
                <span>المجموع</span>
                <span id="summary-total">${{ $total }}</span>
            </div>
            <button class="checkout-btn"
            wire:click="checkout({{ $total }})">
                متابعة الطلب
            </button>
        </div>
    </div>
</div>
