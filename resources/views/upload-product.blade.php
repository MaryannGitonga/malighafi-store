<!DOCTYPE html>
<html>
    <body>
        <form action="{{route('products.store')}}", method="POST" enctype="multipart/form-data" id="image_form">
            @csrf
            <label for="prod_name">Product name:</label>
            <input type="text" id="prod_name" name="name" required>

            <label for="prod_description">Description:</label>
            <input type="text" name="description" id="prod_description" required>

            <label for="prod_price">Price:</label>
            <input type="number" name="price" id="prod_price" step="any" required>
            <br>

            <label for="prod_category">Category</label>
            <select name="category" id="prod_category" required >
                @foreach ($categories as $category)
                    <option  value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select>
            <br>
            <label for="prod_units">Units</label>
            <input type="text" name="units" required>

            <label for="prod_path">Image</label>
            <input type="file" name="path" id="prod_path" required>

            <input type="submit" value="submit" name="btn_submit">
        </form>
    </body>
</html>
