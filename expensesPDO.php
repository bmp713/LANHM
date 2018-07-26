<?php
// PDO class for expenses database and MySQL connection
class Expenses{
    // Connection to MySQL database
    public $connection;
    private $host;
    private $db_name;
    private $username;
    private $password;

    // Constructor for database object
    public function __construct($host, $db_name, $username, $password){
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
        try{
            // Create connection to database
            $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
        }catch( PDOException $error ){
            echo 'Connection Error: ' . $error->getMessage();
        }
    }
    // Creates new user for database
    public function createUser( $user, $email, $password ){
        $sql = "INSERT INTO users(user, email, password) VALUES('$user', '$email', '$password');";
        $this->connection->exec( $sql );
    }
    // Return not null if user exists in database
    public function checkUserExists( $user, $password ){
        $sql = "SELECT * FROM users WHERE user='$user' AND password='$password'";

        $result = $this->connection->query( $sql );
        return $result->fetch( PDO::FETCH_ASSOC );
    }
    // Returns not null if user id exists
    public function getUserId( $user, $password){
        $sql = "SELECT * FROM users WHERE user='$user' AND password='$password'";
        $result = $this->connection->query( $sql );
        // Fetch associative array for user and return id field        
        return $result->fetch( PDO::FETCH_ASSOC )['id'];
    }
    // Creates new expense in database associated with specific user id
    public function createExpense( $user_id, $name, $amount, $category ){
        $sql = "INSERT INTO expenses(user_id, name, amount, category) VALUES('$user_id', '$name', '$amount', '$category');";
        $this->connection->exec( $sql );
    }
    // Renders all database expenses by timestamp
    public function readExpenses(){
        $sql = "SELECT * FROM expenses";
        $this->printTable( $sql );
    }
    // Renders only expenses associated with specific user
    public function readExpensesByUser( $user ){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM expenses WHERE user_id=$user_id";
        $this->printTable( $sql );
    }
    private function printTable( $sql ){
        $result = $this->connection->query( $sql );

        // Render table of all expenses by timestamp
        echo "<table border = '1'>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>user_id</th>";
                echo "<th>name</th>";
                echo "<th>date</th>";
                echo "<th>amount</th>";
                echo "<th>category</th>";
            echo "</tr>";
            while( $row = $result->fetch( PDO::FETCH_ASSOC ) ){
                echo "<tr>";
                foreach( $row as $key => $value){
                    echo "<td>$value</td>";
                }
                echo "</tr>"; 
            }
        echo "</table>";
    }
}
?>
