<!DOCTYPE html>
<html>
<head>
<title>LANHM Expenses</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="style.css">
<script src="style.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <span><img id="logo" src="assets/NHM_logo.gif" height="50"></span>
            <span id="header_1">
                <?php 
                    session_start();
                    if( $_SESSION['logged_in'] == true ){
                        echo $_SESSION['user'].' logged in<br>';
                        echo '<a id="header_2" href="index.php">Logout</a>';
                    }else{
                        header("location: index.php");
                    }
                ?>
            </span><br>
        </div>
        <div id="content">
            <div id="tabs">
                <div onclick="tab_1()" id="tab_1">Expenses</div>
                <div onclick="tab_2()" id="tab_2">New Expense</div>
                <div id="box_1">
                    <?php 
                        require 'expenses.php';
                        echo "All Expenses Over Time<br><br>";
                        $conn->readExpenses(); 
                        echo '<br><br>';
                        echo $_SESSION['user']."'s Expenses<br><br>";
                        $conn->readExpensesByUser( $_SESSION['user'] );
                    ?>
                </div>
                <div id="box_2">
                    <form class="form" action="expenses.php" method="post">
                        New Expense<br><br>
                        Name<br><input class="box" type="text" name="name"><br>
                        Amount<br><input class="box" type="text" name="amount"><br>
                        Category<br><input class="box" type="text" name="category"><br><br>
                        <button class="button" type="submit" name="expense">Enter</button>
                    </form>                    
                </div>
            </div>
        </div>

    </div> <!--END wrapper-->
</body>
</html>



