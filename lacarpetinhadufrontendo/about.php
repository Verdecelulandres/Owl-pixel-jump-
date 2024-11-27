<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - PIXEL OWL</title>

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

        body {
            font-family: 'Source Code Pro', monospace;
            background: url('./img/background.png') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            padding-top: 0px;
        }

        .about-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            max-width: 800px;
            width: 100%;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #d500f9;
        }

        p {
            font-size: 1rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .about-images {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .about-images img {
            max-width: 45%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
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
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav>
        <div class="navbar-container">
            <div class="logo">PIXEL OWL</div>
            <div>
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página About -->
    <div class="about-container">
        <h1>About PIXEL OWL</h1>
        <p>PIXEL OWL is an exciting, fast-paced game where players need to solve puzzles, collect items, and race against time. The goal is simple yet challenging: use your problem-solving skills to advance through levels, collect rewards, and aim for the highest score on the leaderboard. Immerse yourself in the pixelated world, where every step counts and every decision matters.</p>

        <p>The game features a variety of challenges, from logic puzzles to timed events, and rewards those who can think quickly and strategically. Whether you’re playing solo or competing with friends, there’s always a new challenge to tackle.</p>

        <p>We are constantly improving and adding new levels, ensuring that there's always something new to explore. Join us in this pixelated adventure and see how far you can go!</p>

        <!-- Imágenes del juego -->
        <div class="about-images">
            <img src="img/screenshot1.png" alt="Game Screenshot 1">
            <img src="img/screenshot2.png" alt="Game Screenshot 2">
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Pixel Owl. Designed by Andres Laverde and Mateo Duque. Instructor: Karanmeet Khatra, Subject: Web development with LAMP</p>
    </footer>

</body>
</html>

