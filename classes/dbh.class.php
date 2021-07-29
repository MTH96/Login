<?php

// $conn = mysqli_connect('localhost', "mahmoud", "1242", "Login", "8806");
// if (!$conn) {
//     echo "error: " . mysqli_connect_error();
// }

class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $chrarset;
    protected $table;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "mahmoud";
        $this->password = "1242";
        $this->dbname = "Login";
        $this->chrarset = "utf8mb4";
        $this->table = "signed_useres";
    }

    protected function connect()
    {

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->chrarset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch (\Exception $e) {
            echo "connection failed: " . $e->getMessage();
        }
    }
}
