<?php
require_once "values.inc.php";
class Connection
{
    var $conn;
    /**
     * It creates a new connection to the database
     * 
     * @param db the name of the database
     */
    function __construct($db)
    {
        global $servername;
        global $username;
        global $password;
        $this->conn = new mysqli($servername, $username, $password, $db);
        if ($this->conn->connect_error) {
            http_response_code(500);
            die(json_encode(array("error" => $this->conn->error)));
        }
    }
    /**
     * The __destruct() function is called when the object is destroyed
     */
    function __destruct()
    {
        $this->conn->close();
    }
}
