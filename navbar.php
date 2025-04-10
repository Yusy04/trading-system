<?php
    $budget = 0;

    if ($_SESSION['user_type'] == 0) {
        $user_ID = $_SESSION['user_id'];
        $sql = "SELECT `Budget` FROM `investor` WHERE `ID_user` = '$user_ID'";
        $result2 = mysqli_query($db,$sql);
        $row2 = mysqli_fetch_array($result2);
        $budget = $row2['Budget'];
    }

    // echo $_SESSION['user_type'];
?>

<nav class="navbar navbar-fixed-top navbar-default mu-navbar mu-nav-show">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Logo -->
            <a class="navbar-brand">WAI TO DEVELOP</a>

            <?php 
                if ($_SESSION['user_type'] == 0) {
                    ?><a class="navbar-brand" style = "color: #2097fc; padding-left: 300px;">Budget: <?php echo $budget; ?>$</a> <?php
                }?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav mu-menu navbar-right">
                <?php 
                    if ($_SESSION['user_type'] == 2) {
                      ?><li class = "active"><a href="update_data.php">Update Quizz</a></li><?php
                      ?><li class = "active"><a href="admin_links.php">Admin Links</a></li><?php
                    }
                ?>
                <li class = "active"><a href="companies_table.php">Companies table</a></li>

                <!-- <li style = "color: #2097fc; padding-left: 500px;"> Budget: </li> -->
                <li class = "tickets"> <a href = "logout.php">  Logout <i class="fa fa-sign-out" style="font-size:17px"></i> </a></li>

            </ul>
        </div><!-- /.nfavbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>	