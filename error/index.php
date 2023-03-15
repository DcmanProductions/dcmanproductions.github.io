<!-- A LFInteractive Project -->

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - LFInteractive</title>

    <?php
    $title = "Error";
    $description = "Error";
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
            <h1 style="margin-bottom: 0; color: var(--primary);">
                <?php
                if (isset($_GET["c"])) {
                    $code = $_GET["c"];
                    switch ($code) {
                        case "400":
                            echo "Bad Request!";
                            break;
                        case "401":
                            echo "Unauthorized Access";
                            break;
                        case "402":
                            echo "Payment Issue?";
                            break;
                        case "403":
                            echo "Your not Allowed Here";
                            break;
                        case "404":
                            echo "Page not Found";
                            break;
                        case "429":
                            echo "Too Many Requests";
                            break;
                        case "500":
                            echo "This is our bad!";
                            break;
                        case "501":
                            echo "This is our bad!";
                            break;
                        case "502":
                            echo "How are you seeing this?";
                            break;
                        case "511":
                            echo "Client not Authenticated!";
                            break;
                        case "no-cust":
                            echo "No Booking was Found!";
                            break;
                        default:
                            echo "Something went Wrong";
                            break;
                    }
                } else {
                    header("location: /error/?c=500");
                }
                ?>
            </h1>
            <h4 style="margin-top: 0">Sorry for the inconvenience</h4>
            <div class="row">
                <a href="#contact-us" class="btn primary">Request a Quote</a>
                <a href="/clients" class="btn secondary">Our Clients</a>
            </div>
        </div>


        <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/contact-form.php";    ?>

    </main>


    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

    <script src="/assets/js/min/nav.min.js"></script>
</body>

</html>