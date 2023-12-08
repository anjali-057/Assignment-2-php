<?php
class signup
{
    // Private Variables
    private $servername = "172.31.22.43";
    private $username = "Anjali200556508";
    private $password = "829I6MkzoT";
    private $dbname = "Anjali200556508";
    public $con;

    // Database Connection
    public function __construct()
    {
        $this->con = mysqli_connect($this-> servername, $this-> username, $this->password, $this->dbname);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to database" . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }


// Function to insert order data into the database
    public function insertData($post)
    {
        $username = $_POST['username'];
        $confirmpassword = $_POST['confirmpassword'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO users1 (username, password,confirmpassword ) 
              VALUES ('$username', '$password', '$confirmpassword')";

        $sql = $this->con->query($query);

        if ($sql) {
            header("Location: loginForm.php");
        } else {
            echo "Error: " . $this->con->error;
        }
    }
}
?>