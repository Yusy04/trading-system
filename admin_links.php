<?php
  include('session.php');

  if ($_SESSION['user_type'] != 2) {
    header("location:logout.php");
  }

  $sql = "SELECT `ID` FROM `users` WHERE `account_type` = 0";
  $result = mysqli_query($db,$sql);
//   $count = 0;

  if(isset($_POST['initialise'])) {
    while ($row = mysqli_fetch_array($result)) {
        $user_ID = $row['ID'];
        $sql = "INSERT INTO investor (`ID_user`, `Budget`, `Shares_Company1`, `Shares_Company2`, `Shares_Company3`, `Shares_Company4`, `Shares_Company5`, `Shares_Company6`, `Shares_Company7`, `Shares_Company8`, `Shares_Company9`, `Shares_Company10`) VALUES ('$user_ID', 7500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
        mysqli_query($db,$sql);
        // $count++;
    }
	// echo $count;
    header("location:companies_table.php");
  }
  else if (isset($_POST['pause_game'])) {
	$sql = "SELECT * FROM `additional` WHERE 1";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

	$newvalue = 1 - $row['is_paused'];
	$sql = "UPDATE `additional` SET `is_paused` = '$newvalue'";
	mysqli_query($db,$sql);
  }
  else if (isset($_POST['add_users'])) {
	$users = ['ZVEHK-1', 'TBCAN-1', 'F9GLX-2', 'JMBLF-1', '9XZQC-1', 'NKGUC-1', 'QCEJC-1', 'AAKJB-1', 'Q3GHE-4', '7ZZHE-1', 'ZK7ZV-3', 'QDCWB-3', 'RRSUW-1', 'YYR3B-2', 'PQSXX-2', 'DWEHN-4', 'DWEHN-8', 'FEL79-3', 'J3FL3-2', 'J3FL3-4', 'NSEKW-4', 'BJZGQ-1', 'YGA7U-2', 'MRXEX-1', 'WRCHL-1', 'J9L99-1', 'J9L99-2', 'U7JFV-3', 'DB9PG-1', 'DB9PG-7', 'QZ7ME-4', 'MNKYJ-7', 'MNKYJ-8', 'XCBPP-3', '3PWX3-4', 'BUBBT-2', 'RBFG7-2', 'RLPDP-3', 'BM7PK-3', 'ET77N-3', 'ZNXMF-1', 'SRUWL-2', 'BWHEX-2', 'BWHEX-5', 'BCKU9-3', 'JE7DH-2', 'RXDME-2', 'AGRNR-7', 'AGRNR-11', 'AGRNR-15', '9U7G9-1', 'UHE3E-2', 'UHE3E-4', 'UHE3E-6', '9WE9G-2', '9WE9G-4', 'QHTGX-1', 'W7W7A-1', 'JUTCW-4', 'JUTCW-8', 'RE9YE-2', '7ANCA-2', 'HCSH3-1', 'UJNN9-1', 'ELUPB-1', 'LGFAK-1', 'EDLTV-1', 'AKG7L-1', 'AMZB9-3', '79ZLS-3', 'XHBRC-3', 'EWRAC-3', 'BPWUS-1', 'YTAKX-1', 'PMFHQ-1', 'N7QDR-1', 'ESWLG-1', 'YWPKN-2', 'NDC93-2'];

	$size = count($users);
	for ($i = 0; $i < $size; $i++) {
		$sql = "INSERT INTO `users` (`Password`, `Email`, `account_type`) VALUES ('$users[$i]', '$users[$i]', 0)";
		mysqli_query($db, $sql);
	}
	header("location: companies_table.php");
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
		<link href="style_admin_links.css" rel="stylesheet">
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
		<?php include ("navbar.php"); ?>
		
        <br>
        <br>
        <br>


		

		<!-- End menu -->
		<br>


        <div id = "principal">
            <!-- <h1 style = "text-align:center;"> Current Budget: 5000$</h1>
			<h1 style = "text-align:center;"> Shareholds Value: 0$</h1> -->
			
			<br>
			<br>


			<form action = "" method = "post">
				<div style="text-align:center;">
					<input type="submit" name = "initialise" value="Initialise investor">
                    <br>
					<?php
						$sql = "SELECT * FROM `additional` WHERE 1";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_array($result);

						if ($row['is_paused'] == 0)
							$value = "Pause Game";
						else
							$value = "Unpause game";
					?>
                    <input type="submit" name = "pause_game" value="<?php echo $value; ?>">
					<br>
					<input type="submit" name = "add_users" value="Add all users">
				</div>
			</form>

			<div style="text-align:center;">
				<a href = "update_data.php"><input type="submit" name = "add_users" value="Update Quizz"></a>
			</div>

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