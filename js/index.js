AOS.init();

const bars = document.getElementById("menu-bars");
const navMenu = document.getElementById("nav-menu");
const contactSubmit = document.getElementById("contact-submit");
const popFormSubmit = document.getElementById("form-submit");

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


// --------------------------------------- ALERTS FUNCTIONS ------------------------------------
function showAlertBox(type, message){
  var alertBox = document.getElementById("alert");
  var messageBox = document.getElementById("alert-message");
  var icon = document.getElementById("alert-icon");

  alertBox.classList.add("show");
  alertBox.classList.add(type);

  if (type == "error") {
    icon.classList.add("fa-circle-xmark");
  } else {
    icon.classList.add("fa-circle-check");
  }

  messageBox.innerHTML = message;
}

function hideAlertBox(type) {
var alertBox = document.getElementById("alert");
var messageBox = document.getElementById("alert-message");

alertBox.classList.remove("show");
alertBox.classList.remove(type);
messageBox.innerHTML = "";
}

function showAlert(type, message) {
const intervalId = setInterval(showAlertBox(type, message), 1000); 

setTimeout(() => {
    clearInterval(intervalId);
    hideAlertBox(type);
}, 5000); 
}


// --------------------------------------- NAV MENU TOGGLE ------------------------------------

bars.addEventListener("click", () => {
    navMenu.classList.toggle("opened");
})

function closeMenu() {
    if (navMenu.classList.contains("opened")){
        navMenu.classList.remove("opened");
    }
}

// ------------------------------------------------- FAQ --------------------------------------------------------- //
$(document).ready(function () {
  $(".my-accordion .menu").on("click", function () {
    $(".my-accordion .panel").removeClass("open").addClass("close");
    if (!$(this).hasClass("active")) {
      $(".my-accordion .menu").removeClass("active");
      $(this).addClass("active");
      $(this).next().removeClass("close").addClass("open");
    } else {
      $(".my-accordion .menu").removeClass("active");
    }
  });
});

// --------------------------------------------- POP UP FORM ------------------------------------------------------- //

function myFunction() {
  alert("Button Clicked");
}

function openForm() {
  popForm = document.getElementById("pop-form");
  popForm.classList.add("show-form");
}
function closeForm(button) {
  popForm = document.getElementById("pop-form");
  popForm.classList.remove("show-form");
}


// ------------------------------------------------- FORM VALIDATION --------------------------------------------------------- //
function validateName(inputName, errorField) {

  let name = inputName.value;
  let nameError = document.getElementById(errorField);

  if (name.length == 0) {
    nameError.innerHTML = "Name is required";
    return false;
  }
  if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]{1,}$/)) {
    nameError.innerHTML = "Please write your full name";
    return false;
  }
  nameError.innerHTML = " ";
  return name;
}

function validateEmail(input, errorField) {
  let email = input.value;
  let emailError = document.getElementById(errorField);

  if (email.length == 0) {
    emailError.innerHTML = "Email required";
    return false;
  }
  if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*([\.][a-z]{2,4}){1,}$/)) {
    emailError.innerHTML = "Enter a valid email";
    return false;
  }
  emailError.innerHTML = " ";
  return email;
}

function validateTel(input, errorField) {
  let tel = input.value;
  let telError = document.getElementById(errorField);

  if (tel.length == 0) {
    telError.innerHTML = "Phone number required";
    return false;
  }
  if (tel.length !== 10) {
    telError.innerHTML = "phone number should be 10 digits";
    return false;
  }
  if (!tel.match(/^0(?! \d+)[0-9]{9}$/)) {
    telError.innerHTML = "Enter a valid phone number";
    return false;
  }
  telError.innerHTML = " ";
  return tel;
}

function validateMessage(inputMessage, errorField) {
  let message = inputMessage.value;
  let messageError = document.getElementById(errorField);
  let rem = 10 - message.length;

  if (message.length == 0 || message.match(/^\s*$/)) {
    messageError.innerHTML = "This field cannot be empty";
    return false;
  }
  if (rem > 0) {
    messageError.innerHTML = "Atleast " + rem + " more characters required";
    return false;
  }
  messageError.innerHTML = " ";
  return message;
}

function getSelectedService() {
  const serviceRadios = document.querySelectorAll('input[name="service"]');
  let selectedService = '';
  
  serviceRadios.forEach((radio) => {
      if (radio.checked) {
          selectedService = radio.value;
      }
  });
  
  return selectedService;
}

function validateBotCheck(){
  let check = document.getElementById("bot-check").value;
  
  if(check !== ""){
      console.log("Message failed to submit");
      return false;
  } 
  
  return true;
}

const emailBtn = document.getElementById('mailings-submit');
if (emailBtn) {
  emailBtnaddEventListener('click', submitMailingsEmail(emailBtn));
} 

function submitMailingsEmail(emailBtn) {
  e.preventDefault();
  var buttonId = emailBtn.getAttribute('id');
  console.log(buttonId);
  
  localStorage.setItem('buttonId', buttonId);
  
  let emailInput = document.getElementById('mailings-email'); 
  
  let email = validateEmail(emailInput, 'mailings-error');
  let botCheck = validateBotCheck();
  
  if (email && botCheck) {
      // Collect other form data
      let formId = document.getElementById('mailings_form_id').value;
      
    // Call the function with form data
    sendAjaxRequest('/send-email.php',
        {name: 'email', value: email},
        {name: 'form_id', value: formId}
    );
  } else {
      showAlert("error", "Please fix all errors and try again");
  }
}

function sendAjaxRequest(url, sitekey, ...fields) {
  let params = new URLSearchParams();
  var buttonId = localStorage.getItem('buttonId');
  showLoader(buttonId);
  fields.forEach(field => {
      if (field.name && field.value) {
          params.append(field.name, field.value);
      }
  });
  
grecaptcha.ready(function() {
      grecaptcha.execute(sitekey, {action: 'submit'}).then(function(token) {
          params.append('token', token);
          
          // Initialize the XMLHttpRequest
          var xhr = new XMLHttpRequest();
          xhr.open('POST', url, true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function() {
              if (xhr.readyState == 4) {
                  hideLoader(buttonId);
                  if (xhr.status == 200) {
                      var response = JSON.parse(xhr.responseText);
                      console.log(response);
                      if (response.success) {
                        showAlert("success", "Success! Redirecting...")
                        window.location.href = response.redirect;
                      } else {
                          showAlert("error", "There was a problem redirecting you. Please try again.");
                      }
                  } else {
                      showAlert("error", "Error: Message could not be sent. Please try again later.");
                  }
              }
          };
          xhr.send(params);
      });
  });
}

if (popFormSubmit) {
   const sitekey = popFormSubmit.getAttribute('data-sitekey');
   popFormSubmit.addEventListener('click', (e) => submitPopForm(e, sitekey));
}

function submitPopForm(e, sitekey) {
    e.preventDefault();
    var btn = document.getElementById('form-submit');
    var buttonId = btn.getAttribute('id');
    
    localStorage.setItem('buttonId', buttonId);
  
    let nameInput = document.getElementById('float-name');
    let emailInput = document.getElementById('float-email'); 
    let telInput = document.getElementById('float-tel');

    // Validate fields again for submission
    let name = validateName(nameInput, 'float-name-error');
    let email = validateEmail(emailInput, 'float-email-error');
    let tel = validateTel(telInput, 'float-tel-error'); 
    let service = getSelectedService(); 
    let agreement = document.getElementById('agreement');
    let botCheck = validateBotCheck();
    
    if (name && email && tel && service && agreement.checked && botCheck) {
        // Collect other form data
        let formId = document.getElementById('form_id').value;
        
      // Call the function with form data
      sendAjaxRequest('/send-email.php', sitekey,
          {name: 'name', value: name},
          {name: 'email', value: email},
          {name: 'tel', value: tel},
          {name: 'service', value: service}, 
          {name: 'form_id', value: formId}
      );
    } else {
        showAlert("error", "Please fix all errors and try again");
    }
};

if (contactSubmit) {
  const sitekey = contactSubmit.getAttribute('data-sitekey');
  contactSubmit.addEventListener('click', (e) => submitContactForm(e, sitekey));
}

function submitContactForm(e, sitekey) {
    e.preventDefault();
    var btn = document.getElementById('contact-submit');
    var buttonId = btn.getAttribute('id');
    
    localStorage.setItem('buttonId', buttonId);
  
    let nameInput = document.getElementById('name');
    let emailInput = document.getElementById('email'); 
    let telInput = document.getElementById('tel');
    let messageInput = document.getElementById('message');

    // Validate fields again for submission
    let name = validateName(nameInput, 'name-error');
    let email = validateEmail(emailInput, 'email-error');
    let tel = validateTel(telInput, 'tel-error'); 
    let message = validateMessage(messageInput, 'message-error'); 
    let botCheck = validateBotCheck();
    
    if (name && email && tel && message && botCheck) {
        // Collect other form data
        let formId = document.getElementById('form_id').value;
        
      // Call the function with form data
      sendAjaxRequest('/send-email.php', sitekey,
          {name: 'name', value: name},
          {name: 'email', value: email},
          {name: 'tel', value: tel},
          {name: 'message', value: message},
          {name: 'form_id', value: formId}
      );
    } else {
        showAlert("error", "Please fix all errors and try again");
    }
};

function showLoader(buttonId) {
  var loaderId = buttonId.replace('submit', 'loader');
  var loader = document.getElementById(loaderId);
  loader.style.display = "inline";
}

function hideLoader(buttonId) {
  var loaderId = buttonId.replace('submit', 'loader');
  var loader = document.getElementById(loaderId);
  loader.style.display = "none";
  localStorage.removeItem(buttonId);
}

// ------------------------------------------------- HERO SECTION --------------------------------------------------------- //
// Hero Slider Logic
document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".slide");
  const pills = document.querySelectorAll(".pill");
  let currentSlide = 0;
  let slideInterval = setInterval(nextSlide, 8000); // Auto-slide every 8 seconds

  // Function to show the current slide
  function showSlide(index) {
      slides.forEach((slide, i) => {
          slide.classList.toggle("active", i === index);
          pills[i].classList.toggle("active", i === index);
      });
  }

  // Move to the next slide
  function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
  }

  // Manual slide navigation using pills
  pills.forEach((pill, index) => {
      pill.addEventListener("click", () => {
          clearInterval(slideInterval); // Stop auto-slide when manually navigating
          currentSlide = index;
          showSlide(currentSlide);
          slideInterval = setInterval(nextSlide, 5000); // Restart auto-slide
      });
  });

  // Initial display
  showSlide(currentSlide);
});