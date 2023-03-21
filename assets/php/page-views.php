<?php
require_once "connection.inc.php";
if (isset($_POST["org"])) {

    header("Content-Type: application/json");
    die(IncrementPageView($_POST["org"]));
} else if (isset($_GET["org"])) {

    header("Content-Type: application/json");
    die(GetPageView($_GET["org"]));
}


/**
 * It increments the page view count for the current month for the specified organization
 * 
 * @param org The organization's name
 * 
 * @return The number of rows affected.
 */
function IncrementPageView($org)
{
    $conn = new Connection("lfinteractive");
    $month = strtolower(date("F"));
    $current = 0;
    $sql = "SELECT `$month` FROM `page-views` WHERE `org`=? LIMIT 1";
    $stmt = $conn->conn->prepare($sql);
    if ($stmt->bind_param("s", $org)) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $current = $result->fetch_assoc();
                $current = json_encode(array_pop($current));
                $current = intval($current);
            }
        }
    }

    $current++;

    $sql = "UPDATE `page-views` SET `$month`='$current' WHERE `org`=?";
    $stmt = $conn->conn->prepare($sql);
    if ($stmt->bind_param("s", $org)) {
        if ($stmt->execute()) {
            return json_encode([$month => $current]);
        }
    }
}
/**
 * It gets the page view count for a given organization.
 * 
 * @param org The organization name
 */

function GetPageView($org)
{
    $conn = new Connection("lfinteractive");
    $sql = "SELECT * FROM `page-views` WHERE `org`=? LIMIT 1";
    $stmt = $conn->conn->prepare($sql);
    if ($stmt->bind_param("s", $org)) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return json_encode($result->fetch_assoc());
            }
        }
    }
}
