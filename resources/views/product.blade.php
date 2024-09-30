<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            font-size: 1rem;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="file"] {
            padding: 12px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Product</h1>
        <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                {{-- <label for="name">Product Name</label> --}}
                <input type="text" id="name" value="{{ old('name') }}"name="name" placeholder="Product Name"  class="@error('name') is-invalid @enderror" />
                @error('name')
                {{$message }}
                @enderror
            </div>

            <div class="form-group">
                {{-- <label for="price">Product Price</label> --}}
                <input type="text" id="price" name="price" placeholder="Product Price" required />
            </div>

            <div class="form-group">
                {{-- <label for="size">Product Size</label> --}}
                <input type="text" id="size" name="size" placeholder="Product Size" required />
            </div>

            <div class="form-group">
                {{-- <label for="stock">Stock</label> --}}
                <input type="number" id="stock" name="stock" placeholder="Product stock" required />
            </div>

            <div class="form-group">
                {{-- <label for="image">Product Image</label> --}}
                <input type="file" id="image" name="image" placeholder="Product image" required />
            </div>

            <div class="form-group">
                {{-- <label for="brand">Brand</label> --}}
                <input type="text" id="brand" name="brand" placeholder="Product brand"  required />
            </div>

            <div class="form-group">
                {{-- <label for="category">Category</label> --}}
                <input type="text" id="category" name="category" placeholder="Product category" required />
            </div>

            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
            </div>

            <div class="form-group">
                   <label>color</label>
                   <input type="checkbox" name="star[]" value="red"/><label>red</label>
                   <input type="checkbox" name="star[]" value="blue"/><label>blue</label>
                   <input type="checkbox" name="star[]" value="black"/><label>black</label>
            </div>  

            <input type="submit" name="submit" value="Add Product" />
        </form>
    </div>
</body>
</html>
