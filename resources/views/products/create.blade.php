@extends('layouts.app')

@section('content')

<main class="container">
     <section>
            <div class="titlebar">
                <h1>Add Product</h1>
            </div>

            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
               <div>
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="@error('name') error-field @enderror">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description"
                              class="@error('description') error-field @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview" />
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)"
                           class="@error('image') error-field @enderror">
                    @error('image')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
               <div>
                    <label>Category</label>
                    <select name="category" class="@error('category') error-field @enderror">
                        <option value="">Select Category</option>
                        @foreach (json_decode('{"Smartphone":"Smartphone","Smart TV":"Smart TV","Computer":"Computer"}',true) as $optionKey => $optionValue )
                        <option value="{{$optionKey}}" {{ old('category') == $optionKey ? 'selected' : '' }}>{{$optionValue}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <hr>
                    <label>Inventory</label>
                    <input type="text" class="input @error('quantity') error-field @enderror"
                           name="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <hr>
                    <label>Price</label>
                    <input type="text" class="input @error('price') error-field @enderror"
                           name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
               </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button type="submit" class="btn-link">Save</button>
            </div>
            </form>
        </section>
</main>

<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('file-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0])
    }
</script>
@endsection
