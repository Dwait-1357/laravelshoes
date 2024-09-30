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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .button {
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
            transition: background-color 0.3s, border-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
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
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            position: sticky;
            top: 0;
            z-index: 1;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #eaeaea;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/') }}" class="button">HOME PAGE</a>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Confirm Password</th>
            </tr>
            @foreach ($data as $users)
                <tr>
                    <td>{{ $users->fname }}</td>
                    <td>{{ $users->lname }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->confirmpassword }}</td>
                </tr>
            @endforeach       
        </table>
    </div>
</body>
</html>
