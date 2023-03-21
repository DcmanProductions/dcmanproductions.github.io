<!-- A LFInteractive Project -->

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = "Client Registration";
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
            <div class="form col">
                <h3>Client Registration</h3>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autocomplete="email" placeholder="john.doe@example.com">
                <label for="password">Create Password</label>
                <input type="password" id="password" name="password" autocomplete="new-password" placeholder="*************">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" autocomplete="off" placeholder="*************">
                <label for="auth-token">Authorization Token</label>
                <input type="password" id="auth-token" name="auth-token" autocomplete="off" <?php echo isset($_GET['tok']) ? "readonly" : ""; ?> value="<?php echo isset($_GET['tok']) ? $_GET['tok'] : ""; ?>">
                <toggle id="show-password-toggle">Show Password</toggle>
                <p>***<i><u>The Authorization Token is provided by LFInteractive</u></i>***</p>
                <p>Already have an account, <a href="/client-portal/login/">login here</a></p>
                <p class="error"></p>
                <div class="btn primary">Register</div>
            </div>
        </div>
    </main>

    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

</body>

</html>