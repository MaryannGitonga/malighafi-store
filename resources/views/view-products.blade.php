<!DOCTYPE html>
<html>
    <body>
        @foreach ($products as $product )
            <ul>
                <li>Name: {{$product->name}}</li>
                <li>Description: {{$product->description}}</li>
                <li>Price: {{$product->price}}</li>
                <li>Units: {{$product->units}}</li>
                <img src="{{asset($product->path)}}" alt="product" max width="300px" max height="300px">
                <li>Status: {{\App\Enums\StatusType::getDescription($product->status)}}</li>
                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                    <a  href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </ul>

        @endforeach
    </body>
</html>
