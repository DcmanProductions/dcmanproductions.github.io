<!-- A LFInteractive Project -->

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - LFInteractive</title>

    <?php
    $title = "Thank You";
    $description = "We will be in-touch!";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/meta.php";
    ?>

    <!-- Site Styles -->
    <link rel="stylesheet" href="/assets/css/min/scrollbar.min.css">
    <link rel="stylesheet" href="/assets/css/min/links.min.css">
    <link rel="stylesheet" href="/assets/css/min/main.min.css">

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

        <div class="center col" style="background-color: var(--foreground); color: var(--background); padding: 100px 0; height: 50vh; min-height: 500px">
            <h1 style="margin-bottom: 0; color: var(--primary);">Thank You! </h1>
            <h4 style="margin-top: 0">We will be in-touch!</h4>
            <div class="row">
                <a href="/services" class="btn primary">View our Services</a>
                <a href="/clients" class="btn secondary">Our Clients</a>
            </div>
        </div>
    </main>

    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

    <script src="/assets/js/min/nav.min.js"></script>
</body>

</html>