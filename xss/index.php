<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>CROSS-SITE SCRIPTS</h1>

<button class="button" onclick="window.location.href='login.php'">STORED XSS</button>
<button class="button" onclick="window.location.href='login2.php'">XSS-PHISHING</button>
<button class="button" onclick="window.location.href='../index.php'">Back Home</button>
</body>
</html>
