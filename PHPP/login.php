<?php
class login
{
    private $servername = "172.31.22.43";
    private $username = "Anjali200556508";
    private $password = "829I6MkzoT";
    private $dbname = "Anjali200556508";
    private $con;

    // Database Connection
    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to database: " . mysqli_connect_error());
        }
    }

    // Function to check login credentials
    public function loginn($post)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            $stmt = $this->con->prepare("SELECT * FROM users1 WHERE username = ?");
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $this->con->error);
            }

            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if (!$result) {
                throw new Exception("Error retrieving result set: " . $stmt->error);
            }

            $user = $result->fetch_assoc();
            $passwordVerified=password_verify($password, $user['password']);
            $passwordVerified=$password==$user['email'];
            // Verify password
            if ($user && $password==$user['confirmpassword'] ) {
                header('Location: loginSuccess.php');
                exit();
            } else {
                $error = "Invalid login credentials";
                echo "Error message: " . $error;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
?>
