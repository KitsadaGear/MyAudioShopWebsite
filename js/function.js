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

  function goLogin(){
    document.getElementById('id01').style.display='block' ;
  }

  function exitRegis(){
    document.getElementById('id02').style.display='none' ; 
    goLogin();
  }
  



    




