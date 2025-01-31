<?php
include_once '../controllers/RegisterController.php'; // Include the controller

$nameError = "";
$emailError = "";
$lastNameError = "";
$passwordError = "";
$confirmPasswordError = "";
$registrationMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : "";
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : "";
    $email = isset($_POST['registerEmail']) ? $_POST['registerEmail'] : "";
    $password = isset($_POST['registerPassword']) ? $_POST['registerPassword'] : "";
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";
    $birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : "";
    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";

    // Create an instance of RegisterController
    $registerController = new RegisterController();

    // Use the register() function from the controller
    $registrationResult = $registerController->register($firstName, $lastName, $email, $password, $birthDate, $phoneNumber); 

    // Check for registration errors
    if (is_array($registrationResult) && !empty($registrationResult)) {
        foreach ($registrationResult as $error) {
            if (strpos($error, 'First name') !== false) {
                $nameError = $error;
            } elseif (strpos($error, 'Last name') !== false) {
                $lastNameError = $error;
            } elseif (strpos($error, 'email') !== false) {
                $emailError = $error;
            } elseif (strpos($error, 'Password') !== false) {
                $passwordError = $error;
            } elseif (strpos($error, 'birth date') !== false) {
                $birthDateError = $error;
            } elseif (strpos($error, 'phone number') !== false) {
                $phoneNumberError = $error;
            }
        }
    } else {
        // If registration is successful, redirect or show success message
        header("Location: ../views/login.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<nav class="navbar">
    <div class="navbar-container">
        <a class="navbar-brand" href="home.php">
            <img src="../Images/brandL.png" alt="Cook&Taste Logo">
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
                <li><a class="nav-link" href="../views/dashboard.php">Dashboard</a></li>
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
        <h1>Sign Up</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required>
                <div class="error-message"><?php echo $nameError; ?></div>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required>
                <div class="error-message"><?php echo $lastNameError; ?></div>
            </div>
            <div class="form-group">
                <label for="registerEmail">Email Address</label>
                <input type="email" id="registerEmail" name="registerEmail" required>
                <div class="error-message"><?php echo $emailError; ?></div>
            </div>
            <div class="form-group">
                <label for="registerPassword">Password</label>
                <input type="password" id="registerPassword" name="registerPassword" required>
                <div class="error-message"><?php echo $passwordError; ?></div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <div class="error-message"><?php echo $confirmPasswordError; ?></div>
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="date" id="birthDate" name="birthDate" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="termsCheck" name="termsCheck" required>
                <label for="termsCheck">I agree to the terms and conditions</label>
            </div>
            <button type="submit" class="btn">Register</button>
            <p>Already have an account? <a href="login.php">Go back to Login</a></p>
        </form>
    </div>
</div>

<script>

    function validateForm(event) {
    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();
    let email = document.getElementById("registerEmail").value.trim();
    let password = document.getElementById("registerPassword").value.trim();
    let confirmPassword = document.getElementById("confirmPassword").value.trim();
    let birthDate = document.getElementById("birthDate").value.trim();
    let phoneNumber = document.getElementById("phoneNumber").value.trim();

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(el => el.innerText = '');

    // Validation checks
    if (firstName === "") {
        alert('Please enter your first name!');
        event.preventDefault();
        return false;
    }
    if (lastName === "") {
        alert('Please enter your last name!');
        event.preventDefault();
        return false;
    }
    if (email === "") {
        alert('Please enter your email!');
        event.preventDefault();
        return false;
    }
    let emailRegex = /^[^\@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email!');
        event.preventDefault();
        return false;
    }
    if (password === "") {
        alert('Please enter a password!');
        event.preventDefault();
        return false;
    }
    if (password.length < 8) {
        alert('Password must be at least 8 characters!');
        event.preventDefault();
        return false;
    }
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        event.preventDefault();
        return false;
    }
    if (birthDate === "") {
        alert('Please enter your birth date!');
        event.preventDefault();
        return false;
    }
    if (phoneNumber === "") {
        alert('Please enter your phone number!');
        event.preventDefault();
        return false;
    }
    if (!/^\d{8,15}$/.test(phoneNumber)) {
        alert('Please enter a valid phone number (8-15 digits)!');
        event.preventDefault();
        return false;
    }
    return true;
}

</script>

</body>
</html>