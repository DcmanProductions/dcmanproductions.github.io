<?php
require_once "Authentication.inc.php";
header("Content-Type: application/json");
if (isset($_GET["s"])) {
    $source = $_GET['s'];
    $auth = new Authentication($source);
    if (isset($_GET["c"])) {
        if ($_GET["c"] == "customer") {
            if (isset($_GET["m"])) {
                $method = $_GET['m'];
                if ($method == "login") {
                    if (isset($_POST["username"]) && isset($_POST["password"])) {
                        die($auth->Login($_POST["username"], $_POST["password"]));
                    } else {
                        die($auth->LoginCookies());
                    }
                } else if ($method == "register") {
                    if (isset($_POST["username"])  && isset($_POST["password"]) && isset($_POST["code"])) {

                        die($auth->Register($_POST["username"], $_POST["password"], $_POST["code"]));
                    }
                } else if ($method == "invite") {
                    if (isset($_POST["org"])) {
                        die($auth->GenerateInviteCode($_POST['org']));
                    }
                }
            }
        } else if ($_GET["c"] == "staff") {
            if (isset($_GET['m'])) {
                $method = $_GET['m'];
                if ($method == "login") {
                    if (isset($_POST['username']) && isset($_POST['password'])) {
                        die($auth->StaffLogin($_POST["username"], $_POST['password']));
                    } else {
                        die($auth->StaffLoginCookies());
                    }
                } else if ($method == "register") {
                    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["auth-token"])) {
                        die($auth->RegisterStaff($_POST["email"], $_POST["password"], $_POST["first_name"], $_POST["last_name"], $_POST["auth-token"]));
                    }
                } else if ($method == "invite") {
                    die($auth->GenerateInviteCode($source));
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
http_response_code(401);
die(json_encode(["error" => "Invalid query"]));
