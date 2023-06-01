<?php
require_once "connection.inc.php";
class Customer
{

    var int $id;
    var string $username;
    var string $password;
    var string $organization;
    var float $total_hours;
    var float $unbilled_hours;
    var string $website;
    var bool $hosting;
    var bool $domain;
    var int $page_views;
    var int $agent;


    function __construct(int $id)
    {
        $this->id = $id;
        $connection = new Connection("lfinteractive");
        $conn = $connection->conn;
        $sql = "SELECT * FROM `users` WHERE `id`=?";
        $stmt = $conn->prepare($sql);
        if ($stmt->bind_param("s", $id)) {
            if($stmt->execute()){
                $result = $stmt->get_result()->fetch_array();
            }
        }
    }
}
