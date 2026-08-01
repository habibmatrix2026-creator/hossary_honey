<?php

use Livewire\Component;
use App\Models\Category;
new class extends Component
{
    public $title,$categories,$is_id=null,$query="";
    //start load category function
    public function loadCategories(){
        $this->categories = Category::where("title","like","%".$this->query."%")->get();
    }
    //end load category function
    //start updated query function
    public function updatedQuery()
    {
        $this->loadCategories();
    }
    //end updated query function
    //start mount function
    public function mount()
    {
        $this->loadCategories();
    }
    //end mount function
    //start save function
    public function save()
    {
        $this->validate([
            "title"=> ["required", "string", "min:3", "unique:categories,title"],
        ]);
        Category::create([
            "title"=> $this->title,
        ]);
        $this->reset("title");
        session()->flash("success","$this->title add successfully");
        $this->loadCategories();
    }
    //end save function
     //start update function
        public function update()
    {
        $this->validate([
            "title"=> ["required", "string", "min:3", "unique:categories,title,$this->is_id"],
        ]);
        $c=Category::findOrFail($this->is_id);
        $c->title = $this->title;
        $c->save();
        $this->reset("title");
        $this->is_id =null;
        $this->loadCategories();
        session()->flash("success","$this->title updated successfully");
    }
    //end update function
    //start reset session function
       public function reset_session()
    {
        session()->forget('success');
    }
    //end reset session function
    //start delete function
    public function delete($id){
       Category::findOrFail( $id )->delete();
       $this->loadCategories();
    }
    //end delete function
    //start edit function
   public function edit($id)
   {
    $this->is_id = $id;
    $c = Category::findOrFail( $id );
    $this->title = $c->title;
   }
   //end edit function
};
?>

<main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <div>
                <h1 class="h3 mb-1">{{ $is_id?"edit category":"Add Category" }}</h1>
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
                    <label class="form-label" for="add_category">Category Title</label>
                    <input class="form-control" id="add_category" type="text" required wire:model="title">
                    @error("title")
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>
                </div>
                <button class="btn btn-outline-secondary">{{ $is_id?"edit category":"Add Category" }}</button>
              </form>


          </section>
        </div>
<!--  -->
          <section class="panel">
            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table" >
                    </i><span>Categories Table</span></h2>
                </div>
                <input class="form-control form-control-sm table-search" type="search"
                wire:model.live="query"
                placeholder="Search Categories">
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="ordersTable" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
       @foreach ($categories as $c)
            <tr>
           <td>{{$c->id}}</td>
           <td>{{ $c->title }}</td>
           <td>
            <button class="btn btn-warning" wire:click="edit({{ $c->id }})">edit</button>
            <button class="btn btn-danger" wire:click="delete({{ $c->id }})">delete</button>
           </td>
            </tr>
       @endforeach

            </tbody>
        </table>
         </div>
          </section>

        <!--  -->
      </main>
