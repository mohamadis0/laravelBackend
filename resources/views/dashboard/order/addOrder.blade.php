<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Product</title>
</head>
<body>
    <form action="/orderDetails/{{$orderDetail->id}}" method="POST">
    @csrf
    @method('PUT')
    <label for="">fname:</label>
    <input type="text" name="fname" placeholder="status" value="{{$orderDetail->fname}}">
    <label for="">lname:</label>
    <input type="text" name="lname" placeholder="status">
    <label for="">company_name:</label>
    <input type="text" name="company_name" placeholder="status">
    <label for="">country_region:</label>
    <input type="text" name="country_region" placeholder="status">
    <label for="">adress:</label>
    <input type="text" name="adress" placeholder="status">
    <label for="">town_city:</label>
    <input type="text" name="town_city" placeholder="status">
    <label for="">state:</label>
    <input type="text" name="state" placeholder="status">
    <label for="">zip_code:</label>
    <input type="number" name="zip_code" placeholder="status">
    <label for="">phone:</label>
    <input type="number" name="phone" placeholder="status">
    <label for="">email:</label>
    <input type="email" name="email" placeholder="status">
    <label for="">notes</label>
    <textarea name="notes" id="" cols="30" rows="10"></textarea>
    <button type="submit">submit</button>
    </form>
</body>
</html>