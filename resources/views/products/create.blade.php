@extends('layouts.app')

@section('content')

<main class="container">
     <section>
            <div class="titlebar">
                <h1>Add Product</h1>
                {{-- <button>Save</button> --}}
            </div>
            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
               <div>
                    <label>Name</label>
                    <input type="text" name="name">
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description" ></textarea>
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" />
                    <input type="file" name="image" >
                </div>
               <div>
                    <label>Category</label>
                    <select  name="" id="" >
                        <option value="" >Email Subscription</option>
                    </select>
                    <hr>
                    <label>Inventory</label>
                    <input type="text" class="input" >
                    <hr>
                    <label>Price</label>
                    <input type="text" class="input" >
               </div>
            </div>
            </form>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </section>
</main>

@endsection
