<?php
session_start(); 

$username="";
$email="";
$password="";
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username= $_POST["username"];
    $email= $_POST["email"];
    $password= $_POST["password"];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "amazon";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sql = "INSERT INTO clone (username,email, password) VALUES ('$username','$email','$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Thanks for signing up!');
        window.location.href='http://192.168.229.204:5500/Actualproject/index.html';
      </script>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: yellow;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 20px;
        }
        button:hover {
            background-color: #e3e300;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2><b>Sign In</b></h2>
    <form action="simple.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"  placeholder="enter your name"required><br>
        <label for="email" id="email" name="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="enter your email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="enter your password" required><br>
        
        <button type="submit">Sign In</button>
    </form>
</div>

</body>
</html>
