<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello {{ $sellerName}},</p>
    <p>You have a new order.</p>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ number_format($product->price * $product->quantity) }}</td>
            <td>{{ $product->status }}</td>
        </tr>
    </table>
</body>
</html>
