<!DOCTYPE html>
<html>
<head>
    <title>Hello Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .message {
            background-color: #e8f5e8;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #4CAF50;
            margin: 20px 0;
        }
        .info {
            color: #666;
            font-style: italic;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang!</h1>
        <div class="message">
            <strong>{{ $message ?? 'Hello ' . $name }}</strong>
        </div>
        <div class="info">
            <p>Nama: <strong>{{ $name }}</strong></p>
            <p>Route ini menggunakan middleware ContohMiddleware</p>
            <p>Data diproses melalui HelloController dan HelloService</p>
        </div>
    </div>
</body>
</html>