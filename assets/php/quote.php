<?php
header("Content-Type: application/json");
require_once "Quotes.inc.php";
$quote = new Quote();

if (isset($_POST["name"]) && isset($_POST["website"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["org"])) {
    $name = $_POST["name"];
    $website = $_POST["website"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $org = $_POST["org"];
    die($quote->Request($name, $website, $email, $phone, $org));
} else {
    // die(json_encode(["error"=>"NO"]));
    die($quote->GetRequests());
}
