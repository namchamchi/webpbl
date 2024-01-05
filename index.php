<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>PBL6_CyberSecurity</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1454117096348-e4abbeba002c?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8d2Vic2l0ZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D');
            background-size: cover;
            background-position: center;
        }

        h1 {
            color: #333;
            margin-top: 50px;
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>PBL6_CyberSecurity</h1>
    <form action="redirect.php" method="post">
        <button type="submit" name="page" value="page1">Comment(XSS)</button>
        <button type="submit" name="page" value="page2">Login(SQLi)</button>
        <button type="submit" name="page" value="page3">Path Traversal(Details Images)</button>
        <button type="submit" name="page" value="page4">File Upload(Upload To RCE)</button>
    </form>
</body>
</html>
