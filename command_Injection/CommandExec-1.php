<!DOCTYPE html>
<html>
<head>
    <title>CommandExec-1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #afafaf;
            padding: 15px;
            border-radius: 20px 20px 0 0;
            text-align: center;
        }
        header button {
            margin: 0 10px;
            padding: 5px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        main {
            background-color: #c9c9c9;
            padding: 20px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        form label, input {
            display: block;
            margin-bottom: 10px;
        }
        form input[type="text"],
        form input[type="password"] {
            width: 200px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        form input[type="submit"] {
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
        }
        footer {
            background-color: #ecf2d0;
            padding: 20px;
            border-radius: 0 0 20px 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <button onclick="location.href='../index.php';">Home Page</button>
        <button onclick="location.href='index.html';">Main Page</button>
    </header>

    <main>
        <h1>Login as Admin</h1>
        <form action="CommandExec-1.php" method="GET">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="Admin">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="">

            <input type="submit" value="Submit">
        </form>
    </main>

    <footer>
        <?php
        if(isset($_GET["username"])){
            echo shell_exec($_GET["username"]);
            if($_GET["username"] == "Admin" && $_GET["password"] == "ufoundmypassword")
                echo "WELLDONE";
        }
        ?>
    </footer>
</body>
</html>
