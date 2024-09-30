<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
            margin: 2px 0; /* Added margin for spacing */
        }
        .button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: scale(1.05);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #eaeaea;
        }
        img {
            border-radius: 5px;
            transition: transform 0.3s;
        }
        img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <a href="{{ url('/') }}" class="button">HOME PAGE</a>
            <a href="{{ url('adminproduct/') }}" class="button">ADD PRODUCT</a>
        </div>

        <table>
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Size</th>
                <th>No. of Stock</th>
                <th>Image</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($data as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->stock }}</td>
                <td><img src="{{ asset('uploads/products/'.$product->image) }}" width="70" height="70" alt="Product Image"></td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->category }}</td>
                <td>
                    <a href="{{ url('editproduct', $product->id) }}" class="button" onclick="return confirm('Are you sure you want to update this product?');">EDIT</a>
                </td>
                <td>
                    <a href="{{ url('deleteproduct', $product->id) }}" class="button" onclick="return confirm('Are you sure you want to delete this product?');">DELETE </a>
                </td>    
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
