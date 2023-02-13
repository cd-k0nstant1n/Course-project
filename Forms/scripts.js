function yes_check(){
    console.log("here");
      if (document.getElementById('yesCheck').checked) {
          document.getElementById('ifYes').style.display="block";
      }
      else document.getElementById('ifYes').style.display = 'none';
  }
  
  function roleCheck() {
    if (document.getElementById('dot-1').checked) {
      fetch("../registerForms/studentForm.html").then(response=> response.text()).then(text=> document.getElementById('Form').innerHTML = text);
    }
    else if(document.getElementById('dot-2').checked){
    fetch("../registerForms/teacherForm.html").then(response=> response.text()).then(text=> document.getElementById('Form').innerHTML = text);
    }
    else if(document.getElementById('dot-3').checked){
    fetch("../registerForms/parentForm.html").then(response=> response.text()).then(text=> document.getElementById('Form').innerHTML = text);
    }
  }

  function validate() {
    var password1 = document.getElementById("pass1").value;
    var password2 = document.getElementById("pass2").value;
    if (password1 != password2) {
      document.getElementById("error").innerHTML = "Passwords do not match.";
      return false;
    } else {
      document.getElementById("error").innerHTML = "";
      return true;
    }
  }