<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Navbar</title>
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        /* Navbar styles */
        .navbar {
            background-color: black;
            display: flex;
            justify-content: space-between;
            padding: 20px 30px;
        }
        .navbar-brand {
            color: white;
            text-decoration: none;
            font-size: 24px;
        }
        .navbar-nav {
            display: flex;
            margin: 0;
        }
        .nav-item {
            margin: 0 40px;
            font-size: 20px;
        }
        .nav-link {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #ccc;
        }
        /* Card styles */
        .container {
            padding: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .col-md-4 {
            width: 30%;
            margin: 1.5%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            background-color: white;
            border-radius: 8px;
        }
        .col-md-4:hover {
            transform: scale(1.05);
            box-shadow: 0 16px 80px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 200;
        }
        .card-text {
            font-size: 2rem;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <img src="/uploads/products/logo.jpg" width="150px" height="30px">
        <div class="navbar-nav">
            <div class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Dashboard</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="{{url('/index')}}">Product</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="{{url('/viewuser')}}">Customer</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="#" style="color: gray;">Admin</a>
            </div>
        </div>
    </nav>
   
    <div class="container">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Available Products</h5>
                    <h1 class="card-text">{{ $product }}</h1>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Available Categories</h5>
                    <h1 class="card-text">{{ $category }}</h1>
                </div>
            </div>
    
            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Football Category Products</h5>
                    <h1 class="card-text">{{ $fotball }}</h1>
                </div>
            </div>
    
            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Running Category Products</h5>
                    <h1 class="card-text">{{ $running }}</h1>
                </div>
            </div>
    
            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Cricket Category Products</h5>
                    <h1 class="card-text">{{ $cricket }}</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Total Order</h5>
                    <h1 class="card-text">{{ $order }}</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
