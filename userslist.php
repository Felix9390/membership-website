<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
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

        .user-list {
            list-style-type: none;
            padding: 0;
        }

        .user-list-item {
            margin-bottom: 10px;
        }

        .back-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <h1>User List</h1>
    <div class="container">
        <h2>Registered Users:</h2>
        <ul class="user-list">
            <?php
            // Read the user information from the file
            $users = file("users.txt", FILE_IGNORE_NEW_LINES);

            // Display the usernames in the user list
            foreach ($users as $user) {
                $userInfo = explode(":", $user);
                if (count($userInfo) === 2) {
                    $username = $userInfo[0];
                    echo "<li class='user-list-item'>$username</li>";
                }
            }
            ?>
        </ul>
        <a class="back-btn" href="profile.php">Back to Profile</a>
    </div>
</body>
</html>
