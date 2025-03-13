AOS.init();

const bars = document.getElementById("menu-bars");
const navMenu = document.getElementById("nav-menu");

// --------------------------------------- NAV SUB MENU TOGGLE ------------------------------------

function toggleSubMenu(button) {
    var menu = document.querySelector(".sub-menu." + button);
    if (menu.classList.contains("active")) {
      menu.classList.remove("active");
    } else {
      menu.classList.add("active");
    }
  }
  function closeSubMenu(button) {
    var menu = document.querySelector(".sub-menu." + button);
    if (menu.classList.contains("active")) {
      menu.classList.remove("active");
    }
  }
  
  const buttons = document.querySelectorAll("#dropdown-icon");
  buttons.forEach(function (button) {
    button.addEventListener("click", () => {
      if (button.dataset.menu == "about") {
        toggleSubMenu("about");
      }
    });

// For multiple dropdowns
//   const buttons = document.querySelectorAll("#dropdown-icon");
//   buttons.forEach(function (button) {
//     button.addEventListener("click", () => {
//       if (button.dataset.menu == "about-us") {
//         closeSubMenu("apply");
//         toggleSubMenu("about-us");
//       }
//       if (button.dataset.menu == "apply") {
//         closeSubMenu("academics");
//         toggleSubMenu("apply");
//       }
//     });

  });


// --------------------------------------- NAV MENU TOGGLE ------------------------------------

bars.addEventListener("click", () => {
    navMenu.classList.toggle("opened");
})

function closeMenu() {
    if (navMenu.classList.contains("opened")){
        navMenu.classList.remove("opened");
    }
}

function openForm() {
  popForm = document.getElementById("pop-form");
  popForm.classList.add("show-form");
}
function closeForm(button) {
  popForm = document.getElementById("pop-form");
  popForm.classList.remove("show-form");
}