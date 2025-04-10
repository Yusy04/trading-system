<?php
  include('session.php');;

	$addCorrect = 5;
	$addIncorrect = -7;
	$ok = 0;

  if ($_SESSION['user_type'] != 2) {
    header("location:logout.php");
  }

  if (isset($_POST['submit'])) {
	// header("location: welcome.php");

	//!!!!!! AICI TREBUIE SCHIMBAT
	for ($i = 1; $i <= 10; $i++) {
		$post_parameter = "ans" . $i;
		$ok = $_POST[$post_parameter];
		
		if ($ok == 0)
		  $valadd = $addIncorrect;
		else
		  $valadd = $addCorrect;

		$sql = "UPDATE companies SET `action_price` = `action_price` + '$valadd' WHERE `ID` = '$i';";
		mysqli_query($db,$sql);

		header("location: companies_table.php");
	}
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>WAI TO DEVELOP</title>
		<!-- Font Awesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<!-- Slick slider -->
		<link href="assets/css/slick.css" rel="stylesheet">
		<!-- Theme color -->
		<link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
	
		<!-- Main Style -->
		<link href="style_update_data.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
		<!-- Fonts -->
	
		<!-- Open Sans for body font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
		<!-- Montserrat for title -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	 
	 
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]> -->
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<!--[endif]-->

        <link rel="stylesheet" type="text/css" href="https://ticketing.connecteens.org/connecteens/AI-1/widget/v1.css">
        <script type="text/javascript" src="https://ticketing.connecteens.org/widget/v1.en.js" async></script>
	  </head>
  <body>
  	

  	<!-- Start Header -->
		<!-- Start menu  -->
		<?php include ("navbar.php") ?>	
		
        <br>
        <br>
        <br>


		

		<!-- End menu -->
		<br>

		<?php
			$sql = "SELECT * FROM `companies` WHERE 1;";
			$result = mysqli_query($db,$sql);
		?>

        <div id = "principal">
            <!-- <h1 style = "text-align:center;"> Current Budget: 5000$</h1>
			<h1 style = "text-align:center;"> Shareholds Value: 0$</h1> -->
			
			<br>
			<br>


			<form action = "" method = "post">
				<table>
					<tr>
						<th>Company Name</th>
						<th> Answer </th>
					</tr>

					<?php
						$count = 0; 
						while ($row = mysqli_fetch_array($result)) {
							$name = $row['company_name'];
							$count++;

							
							echo "<tr>";

							?> <td> <?php echo $name ?> </td> <?php
							?> 
								<td>
									<select name="<?php echo "ans" . $count; ?>">
										<option value="1">Correct</option>
										<option value="0">Incorrect</option>
									</select>
								</td>
							<?php

							echo "</tr>";

						}
					?>

				</table>

				<br>
				<br>
				<br>

				<div style="text-align:center;">
					<input type="submit" name = "submit" value="Submit">
				</div>
			</form>

        </div>
	
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <!-- Event Counter -->
    <script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/countdown.js"></script>
  
       
	
    <!-- Custom js -->
	<!-- <script type="text/javascript" src="assets/js/custom.js"></script> -->

	
	
    
  </body>
</html>