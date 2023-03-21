<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/connection.inc.php";

/* A class that is used to authenticate users. */
class Authentication
{
    var $connection = null;
    var $salt;
    /**
     * This function creates a new connection to the database and sets the salt to the global salt.
     * 
     * @param db The database name.
     */
    function __construct(string $db)
    {
        /* Creating a new connection to the database. */
        $this->connection = new Connection($db);

        /* Setting the salt to the global salt. */
        global $salt;
        $this->salt = $salt;
    }

    /**
     * It takes a username and password, hashes the password with the user's IP address, and then
     * compares the hash to the hash in the database
     * 
     * @param string username The username of the user
     * @param string password The password of the user
     * 
     * @return string a JSON string.
     */
    function Login(string $username, string $password): string
    {
        /* Hashing the password with the salt and then comparing it to the hash in the database. */
        $password = crypt($password, $this->salt);
        $sql = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("ss", $username, $password)) {
            return json_encode(["error" => $stmt->error]);
        }
        /* Checking if the statement executed successfully. If it did not, it returns a JSON string with the error. */
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        $result = $stmt->get_result();
        if ($result->num_rows <= 0) {
            return json_encode(["error" => "No users found!"]);
        }
        $data = $result->fetch_assoc();

        /* Creating a token that is based on the user's IP address and the password. */
        $token = crypt($password, $_SERVER["REMOTE_ADDR"]);
        return json_encode(["user" => $data, "token" => $token]);
    }

    /**
     * It checks if the user is logged in by checking if the cookies are set
     * 
     * @return string a JSON string.
     */
    function LoginCookies(): string
    {
        /* Checking if the user is logged in by checking if the cookies are set. */
        if (!isset($_COOKIE["auth_username"]) || !isset($_COOKIE["auth_token"])) {
            return json_encode(["error" => "No authentication cookie was found!"]);
        }
        $username = $_COOKIE["auth_username"];
        $token = $_COOKIE["auth_token"];
        $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("s", $username)) {
            return json_encode(["error" => $stmt->error]);
        }

        /* Checking if the statement executed successfully. If it did not, it returns a JSON string with the error. */
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        $result = $stmt->get_result();
        if ($result->num_rows <= 0) {
            return json_encode(["error" => "No users found!"]);
        }
        /* Checking if the password is correct. */
        $data = $result->fetch_assoc();
        if (crypt($data["password"], $_SERVER["REMOTE_ADDR"]) == $token) {
            return json_encode($data);
        } else {
            return json_encode(["error" => "Invalid password or location changed!"]);
        }
    }

    function StaffLoginCookies(): string
    {
        /* Checking if the user is logged in by checking if the cookies are set. */
        if (!isset($_COOKIE["auth_username"]) || !isset($_COOKIE["auth_token"])) {
            return json_encode(["error" => "No authentication cookie was found!"]);
        }
        $username = $_COOKIE["auth_username"];
        $token = $_COOKIE["auth_token"];
        $sql = "SELECT * FROM staff WHERE username = ? LIMIT 1";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("s", $username)) {
            return json_encode(["error" => $stmt->error]);
        }

        /* Checking if the statement executed successfully. If it did not, it returns a JSON string with the error. */
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        $result = $stmt->get_result();
        if ($result->num_rows <= 0) {
            return json_encode(["error" => "Invalid username or password!"]);
        }
        /* Checking if the password is correct. */
        $data = $result->fetch_assoc();
        if (crypt($data["password"], $_SERVER["REMOTE_ADDR"]) == $token) {
            /* Returning a JSON string with the data. */
            return json_encode($data);
        } else {
            /* Returning a JSON string with the error. */
            return json_encode(["error" => "Invalid password or location changed!"]);
        }
    }
    function StaffLogin(string $username, string $password): string
    {
        /* Hashing the password with the salt and then comparing it to the hash in the database. */
        $enc = crypt($password, $this->salt);
        $sql = "SELECT * FROM staff WHERE username = ? AND password = ? LIMIT 1";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("ss", $username, $enc)) {
            return json_encode(["error" => $stmt->error]);
        }
        /* Checking if the statement executed successfully. If it did not, it returns a JSON string with the error. */
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        $result = $stmt->get_result();
        if ($result->num_rows <= 0) {
            return json_encode(["error" => "Invalid username or password!"]);
        }
        $data = $result->fetch_assoc();

        /* Creating a token that is based on the user's IP address and the password. */
        $ip = $_SERVER["REMOTE_ADDR"];
        $token = crypt($enc, $ip);
        return json_encode(["username" => $data["username"], "first_name" => $data["first_name"], "last_name" => $data["last_name"], "token" => $token]);
        // return json_encode(["user" => $data, "token" => $token, "ip"=>$ip]);
    }

    /**
     * It generates a GUID, removes the curly braces, inserts it into a database, and returns the GUID
     * 
     * @param org The organization that the invite code is for
     * 
     * @return string A JSON string.
     */
    function GenerateInviteCode($org): string
    {
        /* Generating a GUID, removing the curly braces, and removing the dashes. */
        $guid = com_create_guid();
        $guid = str_ireplace("{", "", $guid);
        $guid = str_ireplace("}", "", $guid);
        $guid = str_ireplace("-", "", $guid);

        /* Preparing the SQL statement. */
        $sql = "INSERT INTO `invites`(`org`, `code`) VALUES (?,?)";
        $stmt = $this->connection->conn->prepare($sql);

        /* Checking if the statement is bound to the parameters. */
        if (!$stmt->bind_param("ss", $org, $guid)) {
            return json_encode(["error" => $stmt->error]);
        }
        /* Checking if the statement executed successfully. If it did not, it returns a JSON string
        with the error. */
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        /* Returning a JSON string with the code. */
        return json_encode(["code" => $guid]);
    }
    /**
     * It takes a username, password, and invite code, and if the invite code is valid, it creates a
     * new user with the given username and password, and deletes the invite code
     * 
     * @param string username The username of the user
     * @param string password The password of the user
     * @param string code The invite code
     * 
     * @return string|null a string or null.
     */
    function Register(string $username, string $password, string $code): string | null
    {
        /* Checking if the invite code is valid. */
        $sql = "SELECT org FROM invites WHERE code = ? LIMIT 1";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("s", $code)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        $result = $stmt->get_result();
        if ($result->num_rows <= 0) {
            return json_encode(["error" => "No invite found!"]);
        }
        $data = $result->fetch_assoc();
        $org = $data['org'];

        /* Inserting the username, password, and organization into the database. */
        $sql = "INSERT INTO `users` (`username`, `password`, `org`) VALUES ('?', '?', '?')";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("sss", $username, crypt($password, $this->salt), $org)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }

        /* Deleting the invite code from the database. */
        $sql = "DELETE FROM `invites` WHERE `code` = '?'";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("s", $code)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
    }
    /**
     * It takes in a username, password, first name, last name, and invite code, and if the invite code
     * is valid, it creates a new staff account with the given information, and deletes the invite code
     * from the database
     * 
     * @param string username The username of the staff member
     * @param string password The password the user wants to use
     * @param string first The First name of the user
     * @param string last The Last name of the user
     * @param string code The invite code
     * 
     * @return string a message or error.
     */
    function RegisterStaff(string $username, string $password, string $first, string $last,  string $code): string
    {
        /* Checking if the invite code is valid. */
        $sql = "SELECT id FROM invites WHERE code = ? LIMIT 1";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("s", $code)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }
        $result = $stmt->get_result();
        if ($result->num_rows  == 0) {
            return json_encode(["error" => "No invite found!"]);
        }

        /* Inserting the username, password, first name, and last name into the staff table. */
        $sql = "INSERT INTO `staff` (`username`, `password`, `first_name`, `last_name`) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->conn->prepare($sql);
        $encrypted_password = crypt($password, $this->salt);
        if (!$stmt->bind_param("ssss", $username, $encrypted_password, $first, $last)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }

        /* Deleting the invite code from the database. */
        $sql = "DELETE FROM `invites` WHERE `code` = ?";
        $stmt = $this->connection->conn->prepare($sql);
        if (!$stmt->bind_param("s", $code)) {
            return json_encode(["error" => $stmt->error]);
        }
        if (!$stmt->execute()) {
            return json_encode(["error" => $stmt->error]);
        }

        return json_encode(["message" => "Staff registered successfully!"]);
    }
}
