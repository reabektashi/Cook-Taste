<?php
session_start();
include_once '../controllers/UserController.php';
$hide = "";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin")
        $hide = "";
    else
        $hide = "hide";
} else {
    $hide = "hide";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/form.css">
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
        <a class="navbar-brand" href="../views/home.php">
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
            <li><a class="dropdown-item" href="../../recipes/food.php">Food</a></li>
            <li><a class="dropdown-item" href="../../recipes/desserts.php">Desserts</a></li>
            <li><a class="dropdown-item" href="../../recipes/sidedishes.php">Side Dishes</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="../views/aboutus.php">About Us</a></li>
    <li><a class="nav-link" href="../views/dashboard.php"class="<?php echo $hide ?>">Dashboard</a></li>
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
            <a href="#" id="profileIcon" title="Profile" onclick="toggleModal()">
                <i class="fa fa-user"></i>
            </a>
            <?php
                if (isset($_SESSION['email'])) {
                    echo '<a href="../views/logout.php"></a>';
                } else {
                    echo '<a href="../views/login.php"></a>';
                }
                ?>

        </div>
    </div>
</nav>
    <div class="container">
        <div class="form-box">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return submitForm(event)">
                <h1>Add a User</h1>
                <div class="input-group">
                    <!-- Left column -->
                    <div class="input-group-left">
                        <div class="input-field left">
                            <input type="text" name="firstName" placeholder="First Name" id="firstName">

                        </div>
                        <div class="error-message" id="firstNameError"></div>
                        <p id="errorName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="lastName" placeholder="Last Name" id="lastName">

                        </div>
                        <div class="error-message" id="lastNameError"></div>
                        <p id="errorLName" style="color: red;"></p>
                        <div class="input-field left">
                            <input type="text" name="email" placeholder="Email" id="email">

                        </div>
                        <?php
                        if (!empty($emailError)) {
                            echo "<p style='color: red; font-size:16px;'>$emailError</p>";
                        }
                        ?>
                        <div class="error-message" id="emailError"></div>
                        <p id="errorEmail" style="color: red;">
                        <div class="input-field left">
                            <input type="password" name="password" placeholder="Password" id="password">

                        </div>
                        <div class="error-message" id="passwordError"></div>
                        <p id="errorPassword" style="color: red;"></p>
                    </div>

                    <!-- Right column -->
                    <div class="input-group-right">
                        <div class="input-field right">
                            <input type="text" name="phoneNumber" placeholder="Phone Number" id="phoneNumber">

                        </div>
                        <div class="error-message" id="numberError"></div>
                        <p id="phoneNumberError" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="date" name="birthDate" placeholder="Birth Date" id="date">

                        </div>
                        <div class="error-message" id="dateError"></div>
                        <p id="errorDate" style="color: red;"></p>
                        <div class="input-field right">
                            <input type="text" name="role" placeholder="Role" id="role">

                        </div>
                        <div class="error-message" id="roleError"></div>
                        <p id="errorRole" style="color: red;"></p>
                    </div>
                </div>
                <?php
                if (!empty($Error)) {
                    echo "<p style='color: red; font-size:16px;'>$Error</p>";
                }
                ?>
              <div class="btn-group">
    <button type="submit" name="submitBtn" id="submit" class="btn" style="background-color: #ff9800; color: white;">Submit</button>
              </div>
            </form>
        </div>
    </div>
</body>
<script>
    let submit = document.getElementById("submit");

    function submitForm(event) {
        let firstName = document.getElementById("firstName").value.trim();
        let firstNameError = document.getElementById('firstNameError');
        let lastName = document.getElementById("lastName").value.trim();
        let lastNameError = document.getElementById('lastNameError');
        let email = document.getElementById("email").value.trim();
        let emailError = document.getElementById('emailError');
        let password = document.getElementById("password").value.trim();
        let passwordError = document.getElementById('passwordError');
        let date = document.getElementById("date").value.trim();
        let dateError = document.getElementById('dateError');
        let phoneNumber = document.getElementById('phoneNumber').value.trim();
        let phoneNumberError = document.getElementById('phoneNumberError');
        let role = document.getElementById('role').value.trim();
        let roleError =document.getElementById('roleError');

        firstNameError.innerText = '';
        lastNameError.innerText = '';
        emailError.innerText = '';
        passwordError.innerText = '';
        dateError.innerText = '';
        phoneNumberError.innerText = '';
        roleError.innerText= '';

        let firstNameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!firstNameRegex.test(firstName)) {
            firstNameError.innerText = 'Please enter a valid first name!';
            event.preventDefault();
            return;
        }

        let lastNameRegex = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+$/;
        if (!lastNameRegex.test(lastName)) {
            lastNameError.innerText = 'Please enter a valid last name!';
            event.preventDefault();
            return;
        }

        let emailRegex = /^[^\@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerText = 'Please enter a valid email!';
            event.preventDefault();
            return;
        }

        if (password.length < 8) {
            passwordError.innerText = 'Please enter a valid password!';
            event.preventDefault();
            return;
        }
        if (phoneNumber.length < 9) {
            phoneNumberError.innerText = 'Please enter a valid phone number!';
            event.preventDefault();
            return;
        }

        if (date === "") {
            dateError.innerText = 'Please enter your birth date!';
            event.preventDefault();
            return;
        }
        if(role === "") {
            roleError.innerText = 'Please enter a role!';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            firstNameError.innerText = "";
            lastNameError.innerText = "";
            emailError.innerText = "";
            passwordError.innerText = "";
            dateError.innerText = "";
            phoneNumberError.innerText = "";
            roleError.innerText = "";
     
        }
        clearErrorMessages();
    }
</script>

</html>