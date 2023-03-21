<!-- A LFInteractive Project -->

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/Authentication.inc.php";
$auth = new Authentication("lfinteractive");
$loginData = $auth->StaffLoginCookies();
$data = json_decode($loginData, true);
if (!isset($data["error"])) {
    header('location: /staff-portal');
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = "Staff Login";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/meta.php";
    ?>

    <!-- Site Styles -->
    <link rel="stylesheet" href="/assets/css/min/scrollbar.min.css">
    <link rel="stylesheet" href="/assets/css/min/links.min.css">
    <link rel="stylesheet" href="/assets/css/min/main.min.css">
    <link rel="stylesheet" href="/assets/css/min/input.min.css">
    <link rel="stylesheet" href="/assets/css/min/client-portal.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/libraries/fontawesome/css/all.min.css" media="print" onload="this.media='all'">
    <!-- jQuery -->
    <script src="/assets/libraries/jquery.js"></script>
</head>

<body>

    <?php
    $page = -1;
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/nav.php";
    ?>
    <main>
        <div class="center">
            <form id="login-form" class="form col">
                <h3>Staff Login</h3>
                <label for="username">Email</label>
                <input type="email" id="username" name="username" autocomplete="email" placeholder="john.doe@example.com">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" autocomplete="current-password" placeholder="*************">
                <div class="row">
                    <toggle id="show-password-toggle">Show Password</toggle>
                    <toggle id="remember-me-toggle">Remember Me?</toggle>
                </div>
                <p>New staff, <a href="/staff-portal/register/">register here</a></p>
                <p class="error"></p>
                <div class="btn primary">Login</div>
            </form>
        </div>
    </main>

    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

</body>

</html>