//The Header at home,recipe pages,aboutUs page

// JavaScript for toggling search input visibility
const searchIcon = document.getElementById('searchIcon');
const searchInput = document.getElementById('searchInput');

// To Add click event to the search icon
searchIcon.addEventListener('click', function (event) {
    event.preventDefault(); // To prevent the default anchor action
    searchInput.style.display = searchInput.style.display === 'none' || searchInput.style.display === '' ? 'inline-block' : 'none';
    searchInput.focus(); // To Focus on the input field when it's displayed
});
// Modal Handling for Login and Register
document.addEventListener('DOMContentLoaded', function () {
    const profileIcon = document.getElementById('profileIcon');
    const loginModal = document.getElementById('loginModal');
    const closeModal = document.querySelector('.close');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    // Open modal when clicking the user icon
    profileIcon.addEventListener('click', function () {
        loginModal.style.display = 'block';
    });

    // Close modal when clicking the close button (X)
    closeModal.addEventListener('click', function () {
        loginModal.style.display = 'none';
    });

    // Close modal if user clicks anywhere outside the modal
    window.addEventListener('click', function (event) {
        if (event.target === loginModal) {
            loginModal.style.display = 'none';
        }
    });

    // Show Register Form when clicking the "Register" link
    const showRegisterLink = document.getElementById('showRegister');
    showRegisterLink.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default anchor action
        loginForm.style.display = 'none'; // Hide login form
        registerForm.style.display = 'block'; // Show register form
    });

    // Show Login Form when clicking the "Login" link
    const showLoginLink = document.getElementById('showLogin');
    showLoginLink.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default anchor action
        registerForm.style.display = 'none'; // Hide register form
        loginForm.style.display = 'block'; // Show login form
    });

    

    // Event listener for "Go back to Login" link
    const goBackToLogin = document.getElementById('goBackToLogin');
    goBackToLogin.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default anchor action
        registerForm.style.display = 'none'; // Hide register form
        loginForm.style.display = 'block'; // Show login form
    });
});

//For the carousel (slideshow)

document.addEventListener("DOMContentLoaded", () => {
    const carouselInner = document.querySelector(".carousel-inner");
    const items = document.querySelectorAll(".carousel-item");
    const indicators = document.querySelectorAll(".carousel-indicators button");
    const prev = document.querySelector(".carousel-control-prev");
    const next = document.querySelector(".carousel-control-next");
  
    let currentIndex = 0;
  
    // Function to update the carousel
    const updateCarousel = () => {
      carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
      indicators.forEach((indicator, index) => {
        indicator.classList.toggle("active", index === currentIndex);
      });
    };
  
    // Event listeners for next/prev controls
    next.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % items.length;
      updateCarousel();
    });
  
    prev.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + items.length) % items.length;
      updateCarousel();
    });
  
    // Event listeners for indicators
    indicators.forEach((indicator, index) => {
      indicator.addEventListener("click", () => {
        currentIndex = index;
        updateCarousel();
      });
    });
  });

  //AboutUs Page
  
  // Open Modal
function openModal(modalId) {
  document.getElementById(modalId).style.display = "flex";
}
// Close Modal
function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}
// Close modal when clicking outside content
window.addEventListener("click", (e) => {
  document.querySelectorAll(".modal").forEach((modal) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});
  