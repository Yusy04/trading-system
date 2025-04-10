<?php
    include('session.php');

    if ($_SESSION['user_type'] == 1) {
      header("location:logout.php");
    }

    $sql = "SELECT * FROM `additional` WHERE 1";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    if ($row['is_paused'] == 1) {
        header("location:companies_table.php");
    }


    if (!isset($_GET['id'])) {
        header("location: companies_table.php");
    }

    $company_ID = $_GET['id'];
    $user_ID = $_SESSION['user_id'];

    $sql = "SELECT * FROM `companies` WHERE `ID` = '$company_ID'";
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result);
    $share_price = $row['action_price'];
    $company_name = $row['company_name'];



    $column_name = "Shares_Company" . $company_ID;

    $sql = "SELECT `$column_name`, `Budget` FROM `investor` WHERE `ID_user` = '$user_ID'";
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result);
    $budget = $row['Budget'];
    $current_shares = $row[$column_name];

    $ammount = 0;
    $price = 0;
    $error = "";
    if(isset($_POST['submit'])) {
        $ammount = $_POST['ammount'];
        $price = $_POST['price'];

        if ($ammount > $current_shares)
            $error = "You don't have this ammount of shareholds!";
        else {
            $newAmmount = $current_shares - $ammount;
            $newBudget = $budget + $price;
            $sql = "UPDATE investor SET `$column_name` = '$newAmmount', `Budget` = '$newBudget' WHERE `ID_user` = '$user_ID';";
            mysqli_query($db,$sql);
            header("location: welcome.php");
        }
    }
?>

<!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>WAI TO DEVELOP</title> 

  <link rel="stylesheet" href="./style_sell_actions.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 </head> 

 <body> <!-- partial:index.partial.html --> 

 

  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> 

   <div class="signin"> 

        <div class="content"> 

            <h2>Sell Shareholds <?php echo $company_name ?></h2> 
            <p style = "color:green;"> You currently have <?php echo $current_shares; ?>/15 shareholds for this company </p>
            <p style = "color:#2097fc;"> You can sell a sharehold for <?php echo $share_price; ?>$ </p>



            <div class="form"> 

                <form action = "" method = "post">
                    <div class="inputBox"> 
                        <input type = "number" name = "ammount" id = "ammount" value = "0" oninput="changeAmmount()"  required/><i>Sharehold ammount</i> 
                    </div> 

                    <br>

                    <div class="inputBox"> 
                        <input type = "number" name = "price" id = "price" value = "0" oninput="changePrice()"  required/> <i>Price</i>
                    </div> 

                    <p style="color:red;"> <?php echo $error; ?> </p>
                    <br>

                    <div class="inputBox"> 
                        <input type="submit" name = "submit" value="Sell now!"> 
                    </div>
                </form> 

                <a href="companies_table.php">Go to the companies table</a> 
                <a href="company_history.php?id=<?php echo $company_ID;?>">View this company's history</a>
            </div>

        </div> 

   </div> 

  </section> <!-- partial --> 

 </body>

 <script>
    function changeAmmount() {
        var ratio = <?php echo $share_price; ?>;
        var x = document.getElementById("ammount").value;
        document.getElementById("price").value = x * ratio;
    }

    function changePrice() {
        var ratio = 1 / <?php echo $share_price; ?>;
        var x = document.getElementById("price").value * ratio;
        var ammount = (Math.round(x * 100) / 100).toFixed(2);
        document.getElementById("ammount").value = ammount;
    }
 </script>
 
</html>