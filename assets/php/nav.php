<link rel="stylesheet" href="/assets/css/min/nav.min.css">


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/page-views.php";
IncrementPageView("lfinteractive");

require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/Authentication.inc.php";


$auth = new Authentication("lfinteractive");
$loginData = $auth->StaffLoginCookies();
$data = json_decode($loginData, true);

?>

<nav>
    <i id="mobile-toggle" class="fa fa-bars"></i>
    <a title="Go Home" href="/" id="brand"><img src="/assets/img/logo.svg" alt=""></a>
    <div id="nav-items" class="row">
        <a href="/" class="nav-item" <?php if ($page == 0) echo "selected"; ?> title="Go Home">Home</a>
        <a href="/clients" class="nav-item" <?php if ($page == 1) echo "selected"; ?> title="Go to the client page">Our Work</a>
        <a href="/services" class="nav-item" <?php if ($page == 2) echo "selected"; ?> title="Go to the services page">Services</a>
    </div>
    <div id="nav-buttons">
        <?php
        if (!isset($data["error"])) {
        ?>
            <a href="/staff-portal" class="btn secondary" title="Go to the client portal page"><i class="fa-solid fa-user"></i><span class="text">Staff Portal</span></a>
            <a onclick="Logout()" href="/" class="btn primary" title="Logout of staff account"><i class="fa-solid fa-right-from-bracket"></i><span class="text">Logout</span></a>
            <?php
        } else {
            $loginData = $auth->LoginCookies();
            $data = json_decode($loginData, true);
            if (!isset($data["error"])) {

            ?>
            <a href="/client-portal" class="btn secondary" title="Go to the client portal page"><i class="fa-solid fa-user"></i><span class="text">Client Portal</span></a>
            <a onclick="Logout()" href="/" class="btn primary" title="Logout of staff account"><i class="fa-solid fa-right-from-bracket"></i><span class="text">Logout</span></a>
            <?php
            } else {
            ?>
                <a href="/#contact-us" class="btn primary" title="Scroll to the 'Get a quote' section">Get Quote</a>
                <a href="/client-portal" class="btn secondary" title="Go to the client portal page"><i class="fa-solid fa-user"></i><span class="text">Client Portal</span></a>
        <?php
            }
        }
        ?>
    </div>
</nav>