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
  function clearText() {
    document.getElementById('alert').style.display = 'none';
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
  
  const toggleBtn = document.querySelector('.toggle_btn')
  const toggleBtnIcon = document.querySelector('.toggle_btn i')
  const dropDownMenu = document.querySelector('.dropdown_menu')

  toggleBtn.onclick = function(){
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList.isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars'
  }

  const profileBtn = document.querySelector('.profile-btn');
  const profileDropdown = document.querySelector('.profile-dropdown');

  profileBtn.addEventListener('click', () => {
  profileDropdown.classList.toggle('open');
  });

  const currentPageUrl = window.location.href;

// Get all the tab links
const tabLinks = document.querySelectorAll('.navbar a');

// Loop through the tab links
tabLinks.forEach(link => {
  // Check if the link's href matches the current page URL
  if (link.href === currentPageUrl) {
    // Add the active class to the link
    link.classList.add('active');
  }
});

		function addFunction() {
  const myWindow = window.open("Event-Child-Page-Add.php", "", "width=500,height=500");
		}
		
		function updateFirstPage() {
			location.reload();
		}

		function deleteFunction() {
  const myWindow = window.open("Event-Child-Page-Delete.php", "", "width=500,height=500");
		}
		
		function updateFirstPage() {
			location.reload();
		}

    function delGradeFunction(grade, mail, subject){
      const myWindow = window.open("Delete-Grade-Page.php?grade=" + grade + "&mail=" + mail + "&subject=" + subject,"", "width=500,height=500");
		}
		
		function updateFirstPage() {
			location.reload();
		}
		
/*function deleteGrade()
	{
		<?php
			include 'db_connection.php';
			$subject = $_GET['subject'];
			$sql = "SELECT " . $subject . " FROM students WHERE mail='" . $_GET['mail'] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$grade_index = (int)$_GET['grade'];
			$index = 0;
			$digits = str_split($row[$subject]);
			$new_string = "";
			$deleted = false;
			
			foreach ($digits as $index => $digit)
			{
				if ($index === $grade_index)
				{
					continue;
				}

				$new_string .= $digit;
			}
			
			$sql = "UPDATE students SET $subject = '$new_string' WHERE mail = '" . $_GET['mail'] . "';";
			$result = mysqli_query($connection, $sql);
			//echo '<script>window.opener.updateFirstPage();</script>';
		?>
		
		CloseWindow();
	}*/

    