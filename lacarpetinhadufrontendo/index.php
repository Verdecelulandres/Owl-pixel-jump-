<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'lotto_db';
$user = 'lotto_user';
$password = 'Matraca5500';

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Error: Unable to connect to the database. " . mysqli_connect_error());
}

// Feedback messages for the user
$message = "";

// Form handling logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'login') {
            // Process login
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check credentials in the database
            $username = mysqli_real_escape_string($conn, $username);
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user['username'];
                    header('Location: game.php');
                    exit();
                } else {
                    $message = 'Invalid username or password.';
                }
            } else {
                $message = 'Invalid username or password.';
            }
        } elseif ($action === 'register') {
            // Process registration
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Insert into database
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if (mysqli_query($conn, $query)) {
                $message = 'Registration successful! You can now log in.';
            } else {
                $message = 'Error: Unable to register. ' . mysqli_error($conn);
            }
        }
    }
}

// Fetch users for leaderboard (this will use a fixed score of 56 for now)
$query = "SELECT username FROM users";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    
    <style>
        nav {
            background-color: #333;
            padding: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
        }

        nav .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1.1rem;
        }

        nav a:hover {
            background-color: #555;
        }

        nav .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        footer {
            background-color: #2e2e2e;
            color: #bbb;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            font-size: 0.8rem; 
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }
        
        
        footer p {
            margin: 0;
            color: #bbb;
            font-size: 10px;
        }

        footer .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            font-size: 0.8rem;
        }

        body {
            font-family: 'Source Code Pro', monospace;
            background: url('./img/background.png') no-repeat center center fixed;
            background-size: cover;
            background-position: center -150px;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 0px;
        }

        .container, .leaderboard {
            flex: 1;
            max-width: 20%;
            background: rgba(0, 0, 0, 0.5);
            padding: 15px;
            margin: 0 200px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form {
            margin-bottom: 15px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            margin-bottom: 5px;
            font-weight: bold;
            text-align: center;
        }

        form input {
            width: 100%;
            max-width: 200px;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            text-align: center;
        }

        form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        form button {
            width: 100%;
            max-width: 200px;
            padding: 8px;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            background-color: #d500f9;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #aa00ff;
        }

        .message {
            margin: 8px 0;
            font-weight: bold;
            color: #ff80ab;
        }

        .leaderboard table {
            width: 100%;
            border-collapse: collapse;
        }

        .leaderboard th, .leaderboard td {
            padding: 8px;
            text-align: center;
            font-size: 0.9rem;
            color: #ffffff;
        }

        .leaderboard th {
            background-color: #d500f9;
        }

        .leaderboard tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .leaderboard tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .leaderboard td {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .register-link {
            color: #d500f9;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav>
        <div class="navbar-container">
            <div class="logo">PIXEL OWL</div>
            <div>
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 id="formTitle">Log In</h1>

        <?php if ($message): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <div class="form-container">
            <form method="POST" action="" id="loginForm">
                <input type="hidden" name="action" value="login">
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="username" required>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="password" required>
                <button type="submit">Log In</button>
            </form>

            <p id="registerLinkText">You don't have an account yet? <a href="javascript:void(0)" id="showRegisterFormBtn" class="register-link">Register here</a></p>

            <form method="POST" action="" id="registerForm" style="display: none;">
                <input type="hidden" name="action" value="register">
                <label for="registerUsername">Username</label>
                <input type="text" id="registerUsername" name="username" required>
                <label for="registerPassword">Password</label>
                <input type="password" id="registerPassword" name="password" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>

    <div class="leaderboard">
        <h2>Leaderboard</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Score</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td>56</td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
             <p>© 2024 Pixel Owl. Designed by Andres Laverde and Mateo Duque. Instructor: Karanmeet Khatra, Subject: Web development with LAMP</p>
        </div>
    </footer>

    <script>
        document.getElementById("showRegisterFormBtn").addEventListener("click", function() {
            var loginForm = document.getElementById("loginForm");
            var registerForm = document.getElementById("registerForm");
            var registerLink = document.getElementById("registerLinkText");
            var formTitle = document.getElementById("formTitle");

            formTitle.innerText = "Account Creation";

            registerLink.innerHTML = "Please fill all the fields";

            loginForm.style.display = "none";
            registerLink.style.display = "none";

            registerForm.style.display = "block";
        });
    </script>

</body>
</html>
