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
    <p>Your seller account has been verified! You can now upload your Malighafi to clients on the store. Happy Selling!</p>
    <p><a href="{{ route('products.index') }}">Click Here</a> to start.</p>
</body>
</html>
