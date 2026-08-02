<?php
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Product;
new class extends Component
{
    //
    use WithFileUploads;
    public $is_id=null;
    public $title,$category_id,$details,$image,$price,$price1,$currency_id;
    public $product,$query="";
    //start loadProducts function
    public function loadProducts()
    {
        $this->product = Product::with(['category'])->where("title","like","%".$this->query."%")->get();
    }
    //end loadProducts function
    //start updateQuery function
    public function updatedQuery()
    {
        $this->loadProducts();
    }
    //end updateQuery function
    //start mount function
    public function mount()
    {
        $this->loadProducts();
    }
    //end mount function
    //start save function
    public function save()
    {
        $this->validate(
            [
    'title' => 'required|string|min:3|max:255|unique:products,title',
    'category_id' => 'required|exists:categories,id',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'price' => 'required|numeric|min:0',
    'price1' => 'nullable|numeric|min:0',
            ]
            );
     $path=null;
    if($this->image)
    $path=$this->image->store("photos",'public');
      Product::create([
        'title'       =>trim($this->title),
        'category_id'       =>$this->category_id,
        'details'       =>trim($this->details),
        'price'       =>trim($this->price),
        'price1'       => empty($this->price1) ? null : trim($this->price1),
        'image'       =>$path,
      ]);
       session()->flash("success","$this->title add successfully");
       $this->loadProducts();
       $this->reset('title','category_id',"details","price",'price1',"image");
    }
    //end save function
    //start reset session function
      public function reset_session()
    {
        session()->forget('success');
    }
    //end reset session function
    //start delete function
    public function delete($id)
    {
        Product::findOrFail( $id )->delete();
    }
    //end delete function
    //start edit function
    public function edit($id){
        $this->is_id = $id;
        $product = Product::findOrFail( $id );
        $this->title= $product->title;
        $this->details= $product->details;
        $this->price= $product->price;
        $this->price1= $product->price1;
        $this->category_id= $product->category_id;
    }
    //end edit function
    //start update function
    public function update()
    {
        $this->validate([
          'title' => 'required|string|min:3|max:255|unique:products,title,'.$this->is_id,
    'category_id' => 'required|exists:categories,id',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'price' => 'required|numeric|min:0',
    'price1' => 'nullable|numeric|min:0',
        ]);
        $product = Product::findOrFail( $this->is_id );
        $product->title = $this->title;
        $product->details = $this->details;
        $product->price = $this->price;
         $product->price1 = empty($this->price1) ? null : trim($this->price1);
        $product->category_id = $this->category_id;
        if($this->image)
        $product->image = $this->image->store("photos",'public');
        $product->save();
     session()->flash("success","$this->title updated successfully");
       $this->loadProducts();
       $this->reset('title','category_id',"details","price","price1","image","is_id");
    }
   //end update function
};
?>

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <div>
                <h1 class="h3 mb-1">{{ $is_id?"edit product":"Add product" }}</h1>
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
              <form class="panel needs-validation" wire:submit.prevent="{{$is_id?"update":"save"}}">

                <div class="row g-3">
                  <div >
                    <label class="form-label" for="title">product Title</label>
                    <input class="form-control" id="title" type="text" required wire:model="title">
                    @error("title")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                 <div >
                    <label class="form-label" for="Category">Category</label>
                     <select id="Category" class="form-control" wire:model="category_id">
                        <option value="">-</option>
                        @foreach ($Category=App\Models\Category::all() as $c)
                        <option value="{{$c->id}}">{{ $c->title }}</option>
                        @endforeach
                     </select>
                    @error("category_id")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                 <div >
                    <label class="form-label" for="details">details</label>
                     <textarea class="form-control" id="details" wire:model="details"></textarea>
                    @error("details")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
           <div>
            <label class="form-label" for="image">image</label>
                    <input type="file" class="form-control"  id="image" wire:model="image">
                    @error("image")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div >
                    <label class="form-label" for="price">price</label>
                    <input class="form-control" id="price" type="text" required wire:model="price">
                    @error("price")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                 <div >
                    <label class="form-label" for="price">price for small if located</label>
                    <input class="form-control" id="price" type="text"  wire:model="price1">
                    @error("price1")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                </div>
                <button class="btn btn-outline-secondary">{{ $is_id?"edit product":"Add product" }}</button>
              </form>


          </section>
        </div>
<!--  -->
          <section class="panel">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table" >
                    </i><span>Products Table</span></h2>
                </div>
                <input class="form-control form-control-sm table-search" type="search"
                wire:model.live="query"
                placeholder="Search Products">
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="ordersTable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>category</th>
                        <th>details</th>
                        <th>price</th>
                        <th>price for small</th>
                        <th>image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($product as $p)
                    <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->title}}</td>
                <td>{{$p->category->title}}</td>
                <td>{{$p->details}}</td>
                <td>{{$p->price." $"}}</td>
                <td>
                    @if ($p->price1)
                     {{ $p->price1." $" }}
                     @else
                     null
                    @endif
                </td>
                <td>
                    @if ($p->image)
                  <img src="{{ Storage::url($p->image) }}" width="50" alt=""
                        style="border-radius: 30%">
                        @else
                        no image
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning" wire:click="edit({{ $p->id }})">edit</button>
                    <button class="btn btn-danger" wire:click="delete({{ $p->id }})">delete</button>
                </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
         </div>
          </section>

        <!--  -->
      </main>
