<!DOCTYPE html>
<html>
    <body>
        <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="prod_name">Product name:</label>
            <input type="text" id="prod_name" name="name" value="{{$product->name}}" required>

            <label for="prod_description">Description:</label>
            <input type="text" name="description" id="prod_description" value="{{$product->description}}" required>

            <label for="prod_price">Price:</label>
            <input type="number" value="{{$product->price}}" name="price" id="prod_price" step="any" required>
            <br>

            {{-- <label for="prod_category">Category</label>
            <select name="category" id="prod_category" required >
                @foreach ($categories as $category)
                    <option  value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select> --}}
            <br>
            <label for="prod_units">Units</label>
            <input type="text" name="units" value="{{$product->units}}" required>
{{--
            <label for="prod_path">Image</label>
            <img src="{{$product->path}}" alt="product">
            <input type="file" name="path" id="prod_path" > --}}

            <input type="submit" value="submit" name="btn1_submit">
        </form>
    </body>
</html>
