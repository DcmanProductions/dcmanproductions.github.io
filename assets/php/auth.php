<?php
require_once "Authentication.inc.php";
header("Content-Type: application/json");
if (isset($_GET["s"])) {
    $auth = new Authentication($_GET['s']);
    if (isset($_GET["c"])) {
        if ($_GET["c"] == "customer") {
            if (isset($_GET["m"])) {
                if ($_GET["m"] == "login") {
                    if (isset($_POST["username"]) && isset($_POST["password"])) {
                        $auth->Login($_POST["username"], $_POST["password"]);
                    } else {
                        die($auth->LoginCookies());
                    }
                }
            }
        }
    } else {
        http_response_code(401);
        die(json_encode(["error" => "Category not provided!"]));
    }
} else {
    http_response_code(401);
    die(json_encode(["error" => "Source not provided!"]));
}
