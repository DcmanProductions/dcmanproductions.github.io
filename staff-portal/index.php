<!-- A LFInteractive Project -->

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/Authentication.inc.php";


$auth = new Authentication("lfinteractive");
$loginData = $auth->StaffLoginCookies();
$data = json_decode($loginData, true);
if (isset($data["error"])) {
    header('location: /staff-portal/login');
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/Quotes.inc.php";
$quote = new Quote();
$quotes = json_decode($quote->GetRequests(), true);
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

    $page = json_decode(GetPageView("lfinteractive"), true);

    $val = "[";
    for ($i = 1; $i <= 12; $i++) {
        $date = new DateTime("$i/01/2023");
        $month = strtolower($date->format("F"));
        $val .= $page[$month] . ", ";
    }
    $val .= "]";

    echo "<script>
    let pageViews = $val;
    
    </script>";
    ?>
    <main>
        <h1>Hello, <?php echo $data["first_name"]; ?></h1>

        <section id="data">
            <div class="watermark">Data</div>
            <div class="row">
                <div id="page-view-container">
                    <canvas id="page-views"></canvas>
                </div>
                <div id="profit-container">
                    <canvas id="profit"></canvas>
                </div>
            </div>
        </section>

        <section id="quotes">
            <div class="watermark">Quotes</div>

            <?php
            if (sizeof($quotes) == 0) {
                echo "<h2>No Quotes!</h2>";
            }
            foreach ($quotes as $item) {
            ?>
                <div class="quick-item quote" tabindex="0">
                    <span class="name"> <?php echo $item["org"]; ?> </span>
                    <div class="btn primary add-btn" title="Generate invite code"> <i class="fa fa-plus"></i> </div>
                    <div class="btn secondary more-btn"> <i class="fa fa-ellipsis"></i> </div>
                    <div class="extra center">
                        <div class="col">
                            <p>Name: <b><?php echo $item["fullname"]; ?></b></p>
                            <p>Email: <b><a href="mailto:<?php echo $item["email"]; ?>"><?php echo $item["email"]; ?></a></b></p>
                            <p>Phone Number: <b><?php echo preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $item["phone"]); ?></b></p>
                            <p>Date Requested: <b><?php echo date("l, F dS, Y \a\\t h:i A", strtotime($item["date_requested"])); ?></b></p>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>

        </section>
    </main>

    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/assets/js/min/client-portal.min.js"></script>
</body>

</html>