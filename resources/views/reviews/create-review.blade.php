<DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="{{ route('reviews.store') }} " method="POST">
            @csrf
            <br>
            <label for="user_id">User ID</label>
            <input type="number" name="user_id"><br><br>
            <label for="product_id">Product ID</label>
            <input type="number" name="product_id"><br><br>
            <label for="title">Title</label>
            <input type="text" name="title"><br><br>
            <label for="description">Description</label>
            <input type="text" name="description"><br><br>
            <label for="rating">Rating</label>
            <input type="number" name="rating"><br><br>

            <input type="submit" value="submit">
        </form>
    </body>
 </html>
