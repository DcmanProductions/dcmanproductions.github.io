<!-- A LFInteractive Project -->

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $title = "Our Clients";
    $description = "A list of our favorite clients";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/meta.php";
    ?>

    <!-- Site Styles -->
    <link rel="stylesheet" href="/assets/css/min/scrollbar.min.css">
    <link rel="stylesheet" href="/assets/css/min/links.min.css">
    <link rel="stylesheet" href="/assets/css/min/main.min.css">
    <link rel="stylesheet" href="/assets/css/min/clients.min.css">

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

        <div id="maine-adventures" class="client" onclick="window.open('https://maineadventures.org')">
            <img src="/assets/img/clients/maine-adventures-profile.png" alt="" class="client-profile">
            <div class="content">
                <div class="client-banner"></div>
                <p class="title">Maine Adventures</p>
                <p class="description">Maine Adventures, formerly known as "Allagash Gateway Campground and Cabins," is a picturesque campground situated in northern Maine. Managed by Steve and BeLinda Scanlin, it offers an array of accommodations, including cozy cabins, premium campsites, primitive campsites, and RV sites. Nestled beside Ripogenus Lake, neighboring the expansive Chesuncook Lake, the third largest lake in Maine, spanning 23,070 acres, the campground provides a perfect setting for outdoor enthusiasts. With amenities like showers, a boat launch, a protected marina for docking, canoe and kayak rentals, and convenient transportation services to the Upper West Branch of the Penobscot River Corridor, guests can embark on exciting adventures. Anglers can indulge in fishing for land-locked salmon, brook trout, lake trout, perch, smelt, and cusk, while nature lovers can marvel at the abundant wildlife thriving in this region of Maine. For added convenience, the Main Lodge offers essential items for purchase and a well-stocked library of books, games, and cards for borrowing, ensuring a delightful stay at Maine Adventures.</p>
                <div class="row buttons">
                    <a href="https://maineadventures.org" class="btn secondary" target="_blank">View Site</a>
                    <!-- <div class="btn secondary">Customer Review</div> -->
                </div>
            </div>
        </div>
        <div id="blackhat-hunting" class="client">
            <img src="/assets/img/clients/blackhat-hunting-profile.png" alt="" class="client-profile">
            <div class="content">
                <div class="client-banner"></div>
                <p class="title">Blackhat Hunting</p>
                <p class="description">As a family, we manage 9,000 acres of privately owned property dedicated to recreational hunts. We also reside and operate a year-round campground situated in the heart of this expansive land. The property's access is exclusively restricted to our clients, ensuring that the wildlife can thrive and reach its full potential. We diligently observe and monitor the wildlife using trail cameras and engage in extensive footwork throughout the year. Scouting is our favorite pastime, as we closely monitor trails leading to food sources, while continuously adding and maintaining Food Plots to sustain the local wildlife. </p>
                <div class="row buttons">
                    <a href="https://blackhathunting.com" class="btn secondary" target="_blank">View Site</a>
                    <!-- <div class="btn secondary">Customer Review</div> -->
                </div>
            </div>
        </div>

    </main>

    <!-- JS Scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

    <script src="/assets/js/min/nav.min.js"></script>
</body>

</html>