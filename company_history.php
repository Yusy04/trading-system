<?php
	include("session.php");

	$companyID = 1;
	if (isset($_GET['id']))
		$companyID = $_GET['id'];

	$sql = "SELECT `History0`, `History1`, `History2`, `History3`, `History4`, `History5`, `History6`, `History7` FROM `companies` WHERE `ID` = '$companyID'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
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
		<link href="style_company_history.css" rel="stylesheet">
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
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<style>
			body {
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
				margin: 0;
			}
			/* Set a maximum width for the chart container */
			#chart-container {
				max-width: 600px;
			}
			.button-container {
				margin-top: 20px;
			}
			.button {
				padding: 10px 20px;
				background-color: #4CAF50; /* Green background */
				color: #fff;
				border: none;
				cursor: pointer;
				margin-right: 10px;
				margin-bottom: 10px; /* Add some vertical spacing */
			}
			.button:hover {
				background-color: #45a049; /* Darker green on hover */
			}
		</style>
	  </head>
</head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>

<?php include ("navbar.php"); ?>

<br>
<br>
<br>
<br>

<p>
	 <?php
		$i = 0;
		$n = 0;
		for ($i = 0; $i <= 7; $i++) {
			if ($row[('History' . $i)] > 0) {
				$values[$i] = $row[('History' . $i)];
				$n = max($n, $i);
			}
		}
	?>
</p>

<div id="chart-container">
	<canvas id="chart" width="3000px" height="3000px"></canvas>
</div>

<?php
	if ($_SESSION['user_type'] == 0) {
	?>
		<div class="button-container">
			<a href="invest.php?id=<?php echo $companyID; ?>" class="button">Invest now!</a>
			<a href="sell_actions.php?id=<?php echo $companyID; ?>" class="button">Sell now!</a>
		</div>
	<?php
	}

?>

<!-- <h1 style = "text-align: center;"> Istoricul Companiei X </h1>
<div id="myChart" style="text-align: center; width:100%; max-width:1200px; height:600px;"></div> -->

<script>
    // Sample data for share prices and quiz index, extending to index 8


	const sharePrices = [
		<?php
			for ($i = 0; $i < $n; $i++)
				echo $values[$i] . ", ";
			echo $values[$n];
		?>
	];

	const quizIndex = [
		<?php
			for ($i = 0; $i < $n; $i++) {
				$string = "Q" . $i;
				?> "<?php echo $string;?>", <?php
			}
			$string = "Q" . $n;
			?> "<?php echo $string;?>"<?php
		?>
	];

    // const sharePrices = [500, 100, 120, 140, 160, 180, 200, 220, 240, 260, 280]; // Starting at Quiz 0 with a price of $500
    // const quizIndex = ["Q0", "Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7"];

    // Get the canvas element and initialize the chart
    const ctx = document.getElementById('chart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: quizIndex,
            datasets: [{
                label: 'Share Price ($)',
                data: sharePrices,
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
            }]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Price per Share'
                    },
                    beginAtZero: true,
                    callback: (value, index, values) => '$' + value // Add $ symbol to y-axis labels
                },
                x: {
                    title: {
                        display: true,
                        text: 'Quiz Index'
                    },
                },
            },
        }
    });
</script>

</body>
</html>



