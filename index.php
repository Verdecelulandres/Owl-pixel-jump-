<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css" />
    <title>Login and Registration</title>
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

        <div class="form-container">
            <form method="POST" action="./backend/verifyUser.php" id="loginForm">
                <input type="hidden" name="action" value="login">
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="username" required>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="password" required>
                <button type="submit">Log In</button>
                <p id="registerLinkText">You don't have an account yet? <a href="javascript:void(0)" id="showRegisterFormBtn" class="register-link">Register here</a></p>
                <p id="loginErrorMsg" class="error-msg"></p>
            </form>
            
            <form method="POST" action="./backend/registerUser.php" id="registerForm" style="display: none;">
                <input type="hidden" name="action" value="register">
                <label for="registerUsername">Email</label>
                <input type="email" id="registerEmail" name="username" required>
                <label for="registerUsername">Username</label>
                <input type="text" id="registerUsername" name="username" required>
                <p class="error-msg"></p>
                <label for="registerPassword">Password</label>
                <input type="password" id="registerPassword" name="password" required>
                <p class="error-msg"></p>
                <label for="registerPassword">Re-enter password</label>
                <input type="password" id="re-enter-password" name="re-enter-password" required>
                <p class="error-msg"></p>
                <button id="registerBtn" type="submit">Register</button>
                <p>Already have an account? <a href="javascript:void(0)" id="showLoginFormBtn" class="register-link">Log-in here!</a></p>
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
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
             <p>© 2024 Pixel Owl. Designed by Andres Laverde and Mateo Duque. Instructor: Karanmeet Khatra, Subject: Web development with LAMP</p>
        </div>
    </footer>

    <script src="./scripts/switchForms.js"></script>
    <script src="./scripts/regisVerification.js"></script>
</body>
</html>