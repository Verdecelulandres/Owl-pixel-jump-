<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['logout'])) {
    // Eliminar sesión y redirigir al inicio
    session_destroy();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Page</title>
    
    <style>
        body {
            font-family: 'Source Code Pro', monospace;
            background: linear-gradient(135deg, #6a1b9a, #f06292);
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin-bottom: 20px;
            width: 100%;
        }

        form button {
            width: 100%;
            max-width: 300px;
            padding: 10px;
            font-size: 1rem;
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
            margin: 10px 0;
            font-weight: bold;
            color: #ff80ab;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Welcome to the Game</h1>
        <p class="welcome">Hello, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
        <p class="game-info">Enjoy playing the game</p>

        <form method="POST" action="">
            <button type="submit" name="logout">Log Out</button>
        </form>
    </div>
</body>
</html>
