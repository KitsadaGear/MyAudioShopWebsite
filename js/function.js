function showLoginPassword() {
  var x = document.getElementById("myPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showLogin2Password() {
  var x = document.getElementById("my2Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showOldPassword() {
  var x = document.getElementById("oldPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showNewPassword() {
  var x = document.getElementById("newPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showRegisPassword() {
  var y = document.getElementById("myRegisPassword");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}

function showRepeatPassword() {
  var x = document.getElementById("myRepeatPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function openNav() {
  document.getElementById("setting_bar").style.width = "300px";
  document.getElementById("myPage").style.marginRight = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("setting_bar").style.width = "0";
  document.getElementById("myPage").style.marginRight = "0";
  document.body.style.backgroundColor = "white";
}
