
    <div class="wrapper">
    
      <ul class="carousel">
        <li class="card">
          <div class="img"><h1 class="big-num2">1#</h1></div>
		  <?php
			$sql = "SELECT * FROM students;";
			$result = mysqli_query($connection, $sql);
			$avarage = range(1, mysqli_num_rows($result));
			$mails = range(1, mysqli_num_rows($result));
			
			for($i = 0; $i < mysqli_num_rows($result); $i++)
			{
				$num_of_grades = 0;
				$row = $result->fetch_assoc();
				$mails[$i] = $row['mail'];
				$digits = str_split(strval($row['English']));
				$english = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$english = $english + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$english = $english/sizeof($digits);
				
				$digits = str_split(strval($row['Math']));
				$math = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$math = $math + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$math = $math/sizeof($digits);
				
				$digits = str_split(strval($row['Bulgarian']));
				$bulgarian = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$bulgarian = $bulgarian + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$bulgarian = $bulgarian/sizeof($digits);
				
				$digits = str_split(strval($row['Programming']));
				$programming = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$programming = $programming + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$programming = $programming/sizeof($digits);
				
				$digits = str_split(strval($row['Physical_Education']));
				$pe = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$pe = $pe + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$pe = $pe/sizeof($digits);
				
				$digits = str_split(strval($row['Music']));
				$music = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$music = $music + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$music = $music/sizeof($digits);
				
				$digits = str_split(strval($row['Data_bases']));
				$databases = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$databases = $databases + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$databases = $databases/sizeof($digits);
				
				$digits = str_split(strval($row['Software']));
				$software = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$software = $software + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$software = $software/sizeof($digits);
				
				$digits = str_split(strval($row['Web']));
				$web = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$web = $web + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$web = $web/sizeof($digits);
				
				$digits = str_split(strval($row['Systems']));
				$systems = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$systems = $systems + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$systems = $systems/sizeof($digits);

				$digits = str_split(strval($row['Mop']));
				$mop = 0;
				
				for($j = 0; $j < sizeof($digits); $j++)
				{
					$mop = $mop + (int)$digits[$j];
					if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
				}
				
				//$mop = $mop/sizeof($digits);
				
				if($num_of_grades > 0) {$avarage[$i] = ($english + $math + $bulgarian + $programming + $pe + $music + $databases + $software + $web + $systems + $mop)/$num_of_grades;}
				if($num_of_grades == 0) {$avarage[$i] = 0;}
			}
			
			$best = array(-1, -1, -1, -1, -1);
			$best_mails = array("", "", "", "", "");;
			$biggest_i = 0;
			
			for($j = 0; $j < 5; $j++)
			{
				for($i = 0; $i < sizeof($avarage); $i++)
				{
					if($avarage[$i] > $avarage[$biggest_i])
					{
						$biggest_i = $i;
					}
				}
				
				$best[$j] = $avarage[$biggest_i];
				$avarage[$biggest_i] = -1;
				$best_mails[$j] = $mails[$biggest_i];
				$biggest_i = 0;
			}
			
			$sql = "SELECT * FROM students WHERE mail='" . $best_mails[0] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			
			echo '<h2>' . $row['name'] . $row['family_name'] . '</h2>';
			echo "<span>" . $row['class'] . "</span>";
		  ?>
        </li>
        <li class="card">
          <div class="img"><h1 class="big-num2">2#</h1></div>
          <?php
			$sql = "SELECT * FROM students WHERE mail='" . $best_mails[1] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
		  
			echo "<h2>" . $row['name'] . $row['family_name'] . "</h2>";
			echo "<span>" . $row['class'] . "</span>";
		  ?>
        </li>
        <li class="card">
          <div class="img"><h1 class="big-num2">3#</h1></div>
          <?php
			$sql = "SELECT * FROM students WHERE mail='" . $best_mails[2] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
		  
			echo "<h2>" . $row['name'] . $row['family_name'] . "</h2>";
			echo "<span>" . $row['class'] . "</span>";
		  ?>
        </li>
        <li class="card">
          <div class="img"><h1 class="big-num2">4#</h1></div>
		  <?php
			$sql = "SELECT * FROM students WHERE mail='" . $best_mails[3] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
		  
			echo "<h2>" . $row['name'] . $row['family_name'] . "</h2>";
			echo "<span>" . $row['class'] . "</span>";
		  ?>
        </li>
        <li class="card">
          <div class="img"><h1 class="big-num2">5#</h1></div>
		  <?php
			$sql = "SELECT * FROM students WHERE mail='" . $best_mails[4] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
		  
			echo "<h2>" . $row['name'] . $row['family_name'] . "</h2>";
			echo "<span>" . $row['class'] . "</span>";
		  ?>
		</li>
      </ul>
    </div>