
<a href="{{ url('index') }}" class="button">Display</a>
<!DOCTYPE html>
<html>
<head>
    <title>Football Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .button{
    display: inline-block;
padding: 10px 20px;
font-size: 14px;
font-weight: 600;
text-align: center;
text-decoration: none;
border-radius: 5px;
cursor: pointer;
background-color: #007bff;
color: #fff;
border: 1px solid #007bff;

}
    </style>
</head>
<body>
    <h1>Football Products</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Stock</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><img src="{{ asset('uploads/products/'.$product->image) }}" alt="Product Image"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
</body>
</html>
