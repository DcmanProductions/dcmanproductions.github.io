<?php
require_once "connection.inc.php";
class Quote
{
    var $conn;
    function __construct()
    {
        $this->conn = new Connection("lfinteractive");
    }

    /**
     * It takes in 5 parameters, and inserts them into a database
     * 
     * @param string fullname
     * @param string current_website https://www.example.com
     * @param string email test@test.com
     * @param string phone "123456789"
     * @param string org
     */
    function Request(string $fullname, string $current_website, string $email, string $phone, string $org): string
    {
        $sql = "INSERT INTO `quotes`( `fullname`, `website`, `email`, `phone`, `org`) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->conn->prepare($sql);
        if (!$stmt->bind_param("sssss", $fullname, $current_website, $email, $phone, $org)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        return json_encode(["message" => "Quote requested!"]);
    }

    /**
     * It returns a JSON encoded string of the results of a query.
     * 
     * @return string An array of all the rows in the table.
     */
    function GetRequests(): string
    {
        $sql = "SELECT * FROM `quotes`";
        $stmt = $this->conn->conn->prepare($sql);
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        return json_encode($stmt->get_result()->fetch_array());
    }
}
