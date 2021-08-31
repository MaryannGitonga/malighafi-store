<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello {{ $buyerName}},</p>
    <p>You have successfully paid for your Order No. {{ $orderId }}. The order is currently being processed.</p>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ number_format($product->price * $product->quantity) }}</td>
                <td>{{ $product->status }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
