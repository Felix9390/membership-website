<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    header("Location: index.php");
    exit();
}

// Retrieve username and password from session
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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

        h2 {
            margin-top: 0;
        }

        .profile-info {
            margin-bottom: 10px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .logout-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #f44336;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .logout-btn:hover {
            background: #d32f2f;
        }

        .user-list-btn {
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

        .user-list-btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <h1>Profile</h1>
    <div class="container">
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <div class="profile-info">
            <label>Username:</label>
            <p><?php echo $username; ?></p>
        </div>
        <div class="profile-info">
            <label>Password:</label>
            <p><?php echo $password; ?></p>
        </div>
        <a class="logout-btn" href="logout.php">Logout</a>
        <a class="user-list-btn" href="userslist.php">User List</a>
    </div>
</body>
</html>
