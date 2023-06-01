<!-- A LFInteractive Project -->

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/hashids.inc.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/Quotes.inc.php";

$quote = new Quote();
$request = json_decode($quote->GetRequest($hashids->decode($_GET["id"])[0]), true);


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $title = $request["org"] . " Quote";
    $description = "Quote information for " > $request["org"];
    include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/meta.php";
    ?>

    <!-- Site Styles -->
    <link rel="stylesheet" href="/assets/css/min/scrollbar.min.css">
    <link rel="stylesheet" href="/assets/css/min/links.min.css">
    <link rel="stylesheet" href="/assets/css/min/main.min.css">
    <link rel="stylesheet" href="/assets/css/min/invoice.min.css">
    <link rel="stylesheet" href="/assets/css/min/quote.min.css">
    <link rel="stylesheet" href="/assets/css/min/client-portal.min.css">
    <link rel="stylesheet" href="/assets/css/min/input.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/libraries/fontawesome/css/all.min.css" media="print" onload="this.media='all'">
    <!-- jQuery -->
    <script src="/assets/libraries/jquery.js"></script>
</head>

<body>

    <?php
    $page = -1;
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/nav.php";
    $inviteCheck = json_decode($auth->CheckInviteExists($request["org"]), true);
    $inviteExists = $inviteCheck["exists"];
    ?>
    <script>
        let org = "<?php echo $request["org"]; ?>";
    </script>

    <main class="col">
        <div id="heading" class="row">
            <div id="company-heading" class="col center">
                <div id="company-heading-name" class="row center">
                    <img src="/assets/img/logo.svg" alt="">
                    <div class="col">
                        <h1>LFInteractive</h1>
                        <h4>bring your brand to the age of the internet</h4>
                    </div>
                </div>
                <div class="row center">
                    <div class="tile">
                        <i class="fa fa-file"></i>
                        <div class="tile-header">phone</div>
                        <div class="tile-content"><?php echo preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $request["phone"]); ?></div>
                    </div>
                    <div class="tile">
                        <i class="fa fa-calendar-check"></i>
                        <div class="tile-header">Date Posted</div>
                        <div class="tile-content"><?php echo date("M d, Y", strtotime($request["date_requested"])); ?></div>
                    </div>
                </div>
            </div>
            <div id="invoice-heading" class="col">
                <div class="stamp">Quote</div>
                <div id="invoice-company-information" class="col">
                    <h1><?php echo $request["fullname"]; ?></h1>
                    <h2><?php echo $request["org"]; ?></h2>
                    <h3><a href="<?php echo $request["website"]; ?>"><?php echo $request["website"]; ?></a></h3>
                    <h3><a href="mailto:<?php echo $request["email"]; ?>"><?php echo $request["email"]; ?></a></h3>
                </div>
            </div>
        </div>
        <div class="row" id="schedule-consultation-form">
            <div class="col">
                <h3>Schedule Consultation</h3 <form class="col">
                <label for="interviewer">Interviewer</label>
                <input type="text" autocomplete="name" name="interviewer" id="interviewer" placeholder="John Smith">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="john.smith@example.com">

                <label for="phone">Phone</label>
                <input type="text" autocomplete="mobile" name="phone" id="phone" placeholder="(123) 456-7890">
                <div class="center">
                    <button class="primary">Schedule</button>
                </div>
                </form>
            </div>
            <img src="/assets/img/two-coffee.webp" alt="">
        </div>
        <div id="generate-invite-token" class="col">
            <h3>Generate Invite Token</h3>
            <div class="row">
                <div id="invite-code" title="Copy link!"><?php echo $inviteExists ? $inviteCheck["code"] : ""; ?></div>
                <button id="generate-token" class="primary"<?php echo $inviteExists ? "disabled" : ""; ?>>Generate Token</button>
            </div>
        </div>
    </main>

    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>
    <script src="/assets/js/min/quote.min.js"></script>
</body>

</html>