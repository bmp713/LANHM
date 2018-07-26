<?php
// expenses.php processes HTTP requests from index.php and profile page using expensesPDO object

// Include expenses object usin PHP Data Object connection
require 'expensesPDO.php';
session_start();

// Database credentials
$host = 'localhost';
$username = 'root';
$password = 'Welcome123';
$db_name = 'db_expenses';

// Creates expenses database if does not exist
exec("mysql -u$username -p$password < expenses.sql");
$conn = new Expenses($host, $db_name, $username, $password );

// Validate user input as safe and legal
function validateInput ($data ) {
    return htmlspecialchars( stripslashes( trim($data) ) );
 }
 function validateEmail( $email ){
    return preg_match("\s@\s.\s", $email);
 }
 // If user entered login 
if( isset($_POST['login']) ){
    // Validate user input for illegal characters
    $user = validateInput( $_POST['user'] );
    $password = validateInput($_POST['password']);
    if( $conn->checkUserExists($user, $password) != null ){
        $_SESSION['user'] = $user;
        // Retrieve user id from database
        $_SESSION['user_id'] = $conn->getUserId( $user, $password );
        $_SESSION['password'] = $password;
        $_SESSION['logged_in'] = true;
        header("location: profile.php");
    }else{
        header("location: index.php");
    }
}
// If user created new account
if( isset($_POST['new']) ){
    // Validate user input for illegal characters
    $user = validateInput($_POST['user']);
    $email = validateInput($_POST['email']);  
    $password = validateInput($_POST['password']);
    if( $conn->checkUserExists($user, $password) == null ){
        $_SESSION['user'] = $user;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        // Create new user
        $conn->createUser($user, $email, $password);
        header("location: profile.php");
    }else{
        header("location: index.php");
    }
}
// If user entered new expense from user profile page
if( isset($_POST['expense']) ){
    $user_id = $_SESSION['user_id'];    
    // Validate user input for illegal characters
    $name = validateInput($_POST['name']);
    $amount = validateInput($_POST['amount']);
    $category = validateInput($_POST['category']);
    $conn->createExpense($user_id, $name, $amount, $category);
    header("location: profile.php");
}
?>



