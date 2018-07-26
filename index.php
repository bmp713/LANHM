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
        <?php
			session_start();
    		session_unset();
    		session_destroy();
        ?>
        <div id="header">
            <span><img id="logo" src="assets/NHM_logo.gif" height="50px"></span>
        </div>

        <div id="content">
            <div id="tabs">
                <div onclick="tab_1()" id="tab_1">Log In</div>
                <div onclick="tab_2()" id="tab_2">New Account</div>
                <div id="box_1">
                    <form class="form" action="expenses.php" method="post">
                        Log In To Account<br><br>
                        User<br><span><input class="box" type="text" name="user"><br></span>
                        Password<br><input class="box" type="password" name="password"><br><br>
                        <button class="button" type="submit" name="login">Enter</button>
                    </form>                    
                </div>
                <div id="box_2">
                    <form class="form" action="expenses.php" method="post">
                        New Account<br><br>
                        User<br><span><input class="box" type="text" name="user"><br></span>
                        Email<br><span><input class="box" type="text" name="email"><br></span>
                        Password<br><input class="box" type="password" name="password"><br><br>
                        <button class="button" type="submit" name="new">Enter</button>
                    </form>                    
                </div>
            </div>
        </div>

    </div> <!--END wrapper-->
</body>
</html>



