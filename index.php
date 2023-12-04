<!DOCTYPE html>
<html>
<head>
    <title>Trang Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-image: url('https://media.istockphoto.com/id/1181403907/vector/cyber-security-and-information-or-network-protection-future-technology-web-services-for.jpg?s=612x612&w=0&k=20&c=b6T8_cNms8RD-AAxFpkfvlBiQE8V6aay7X8_gMpfUXw=');
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
        <button type="submit" name="page" value="page3">UploadsProfile(PathTraversal)</button>
        <button type="submit" name="page" value="page4">Coomingsoon</button>
    </form>
</body>
</html>
