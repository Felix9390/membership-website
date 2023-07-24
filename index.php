<?php
session_start();

// Check if the form was submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Validate the form data (you can add more validation if needed)
    if (empty($name) || empty($password)) {
        echo "<p>Please fill in all fields</p>";
    } else {
        // Store the user information in the file
        $data = "$name:$password\n";
        file_put_contents("users.txt", $data, FILE_APPEND);
        echo "<script>alert('Registration successful. You can now login.');</script>";
    }
}

// Check if the form was submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Read the user information from the file
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    $loggedIn = false;

    // Check if the username and password match
    foreach ($users as $user) {
        $userInfo = explode(":", $user);
        if (count($userInfo) === 2 && $name === $userInfo[0] && $password === $userInfo[1]) {
            $loggedIn = true;
            break;
        }
    }

    // Redirect to profile page if login is successful
    if ($loggedIn) {
        $_SESSION["username"] = $name;
        $_SESSION["password"] = $password;
        header("Location: profile.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login and Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <h1>Login and Registration</h1>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="register-name">Username:</label>
                <input type="text" id="register-name" name="name">
            </div>
            <div class="form```php
-group">
                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="password">
            </div>
            <button type="submit" class="btn" name="register">Register</button>
        </form>

        <hr>

        <h2>Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="login-name">Username:</label>
                <input type="text" id="login-name" name="name">
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password">
            </div>
            <button type="submit" class="btn" name="login">Login</button>
        </form>
    </div>
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</body>
</html>

