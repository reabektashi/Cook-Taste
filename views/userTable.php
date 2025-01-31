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
    <title>TABLE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Css/table.css">
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
    <li><a class="nav-link" href="../views/dashboard.php">Dashboard</a></li>
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
    <div class="table">
            <div class="box-add">
                <a href="../views/insertUser.php">
                    <br>
                <button class="button-add">ADD USER</button>
                </a>
            </div>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone Number</th>
                    <th>Birth Date</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php
                      include_once '../repository/UserRepository.php';
                      $userRepository  = new UserRepository();
                      $users = $userRepository->getAllUsers();
                      foreach ($users as $user) {
                        echo 
                        "
                        <tr>
                            <td>$user[id]</td>
                            <td>$user[firstName]</td>
                            <td>$user[lastName]</td>
                            <td>$user[email]</td>
                            <td>$user[password]</td>
                            <td>$user[phoneNumber]</td>
                            <td>$user[birthDate]</td>
                            <td>$user[role]</td>
                            <td colspan='2'><div>
                            <button class='button-update'>
                            <a href='updateUser.php?id=$user[id]'>Update</a>
                          </button>
                            <button class='button-delete' onclick='confirmDelete($user[id])'>
                            <a href='deleteUser.php?id=$user[id]'>Delete</a>
                            </div>
                          </button>
                          </td>
                        </tr>
                        </tr>
                        ";
                      }
                ?>
                
            </table>
        </div>
    </div>
</body>
<script>
    let signupBtn = document.getElementById("signupBtn");
    let signinBtn = document.getElementById("signinBtn");
    let signInButton = document.getElementById('signIn');
    let signUpButton = document.getElementById('signUp');
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
        let phonenumber = document.getElementById('phonenumber');
        let phonenumberError = document.getElementById('phonenumberError');

        firstNameError.innerText = '';
        lastNameError.innerText = '';
        emailError.innerText = '';
        passwordError.innerText = '';

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
        if (phonenumber < 9) {
            phonenumberError.innerText = 'Please enter a valid phone number!';
            event.preventDefault();
            return;
        }
        function clearErrorMessages() {
            firstNameError.innerText = "";
            lastNameError.innerText = "";
            emailError.innerText = "";
            passwordError.innerText = "";
        }
    }
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = 'deleteUser.php?id=' + userId;
        } else {
            event.preventDefault();
        }
    }
</script>

</html>