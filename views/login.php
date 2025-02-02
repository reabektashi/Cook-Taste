<?php
session_start();
include_once '../controllers/LogInController.php';
$hide = "";
if (isset($_SESSION['role'])) {
    $hide = ($_SESSION['role'] == "admin") ? "" : "hide";
} else {
    $hide = "hide";
}


$emailError = "";
$passwordError = "";
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password exist before accessing them
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    if (!empty($email) && !empty($password)) {
        $loginController = new LogInController();
        $loginResult = $loginController->login($email, $password);

        if ($loginResult === true) {
            // Redirect to home page after successful login
            header("Location: home.php");
            exit();
        } else {
            // Handle error messages
            if (strpos($loginResult, 'Email') !== false) {
                $emailError = $loginResult;
            } else {
                $passwordError = $loginResult;
            }
        }
    } else {
        if (empty($email)) {
            $emailError = "Email is required!";
        }
        if (empty($password)) {
            $passwordError = "Password is required!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Cook & Taste</title>
    <link rel="stylesheet" href="../Css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="navbar-container">
        <a class="navbar-brand" href="home.php">
            <img src="../Images/brandL.png" alt="Cook & Taste Logo">
        </a>
        <button class="navbar-toggler" onclick="toggleNav()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-links" id="navbarLinks">
            <ul class="navbar-nav">
                <li><a class="nav-link" href="../views/home.php">Home</a></li>
                <li class="dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown">Recipes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../views/recipes/food.php">Food</a></li>
                        <li><a class="dropdown-item" href="../views/recipes/desserts.php">Desserts</a></li>
                        <li><a class="dropdown-item" href="../views/recipes/sidedishes.php">Side Dishes</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="../views/aboutus.php">About Us</a></li>
                <li class="<?php echo $hide; ?>"><a class="nav-link" href="../views/dashboard.php">Dashboard</a></li>
                <li><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search Recipes">
            <a href="#" id="searchIcon">
                <i class="fa fa-search"></i>
            </a>
        </div>
        <div class="icons">
            <a href="#" id="favoriteIcon" title="Favorites">
                <i class="fa fa-heart"></i>
            </a>
            <a href="login.php" id="profileIcon" title="Profile" onclick="toggleModal()">
                <i class="fa fa-user"></i>
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="form-box">
        <h1>Log In</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateForm(event)">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                <div class="error-message"><?php echo $emailError; ?></div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <div class="error-message"><?php echo $passwordError; ?></div>
            </div>
            <div class="form-group">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</div>

<script>
    function validateForm(event) {
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();
        let emailError = document.querySelector('.error-message');
        let passwordError = document.querySelector('.error-message');

        emailError.innerText = '';
        passwordError.innerText = '';

        if (email === "") {
            emailError.innerText = 'Please enter an email!';
            event.preventDefault();
            return false;
        }
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerText = 'Please enter a valid email!';
            event.preventDefault();
            return false;
        }
        if (password === "") {
            passwordError.innerText = 'Please enter a password!';
            event.preventDefault();
            return false;
        }
        if (password.length < 8) {
            passwordError.innerText = 'Password must be at least 8 characters!';
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>

</body>
</html>
