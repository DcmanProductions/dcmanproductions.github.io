<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LFInteractive - Bring Your Brand to the Age of the Internet</title>
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/meta.php";     ?>

    <!-- Site Styles -->
    <link rel="stylesheet" href="/assets/css/min/main.min.css">
    <link rel="stylesheet" href="/assets/css/min/scrollbar.min.css">
    <link rel="stylesheet" href="/assets/css/min/nav.min.css">
    <link rel="stylesheet" href="/assets/css/min/links.min.css">
    <link rel="stylesheet" href="/assets/css/min/home.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/libraries/fontawesome/css/all.min.css" media="print" onload="this.media='all'">
    <!-- jQuery -->
    <script src="/assets/libraries/jquery.js"></script>
</head>

<body>
    <?php
    $page = 0;
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/php/nav.php";
    ?>
    <section id="landing" class="col">
        <h1>LfInteractive</h1>
        <h2>bring your brand to the age of the internet</h2>
        <div id="landing-cta" class="row">
            <a href="#contact-us" class="btn primary" title="Scroll to the 'Get a quote' section">Get Started</a>
            <a href="/clients" class="btn secondary" title="Go to the client page">Our Client List</a>
        </div>
        <img src="/assets/img/scroll-indicator.svg" alt="" id="scroll-indicator" title="Scroll to content">
    </section>

    <section id="services" class="row">
        <div class="watermark">services</div>
        <div class="col">
            <h3>Web Design</h3>
            <p>Are you looking for a website for your business? Maybe you have a website that is a bit out dated or just isn’t working for you. If so, I’m sure we can find something that is a better fit for you’re business and brand.</p>
            <a href="/services#web-design" class="btn secondary" title="Learn more about how we handle web design">Learn More</a>
        </div>
        <div class="col">
            <h3>Branding</h3>
            <p>Is your business’s brand needing a facelift? Maybe it worked for you when you were smaller, but now you’ve out grown it?
                Well you’ve come to the right place, at LFInteractive we specialize in bringing your brand to the internet age, while still preserving your roots.</p>
            <a href="/services#branding" class="btn secondary" title="Learn more about how we handle your brand">Learn More</a>
        </div>
        <div class="col">
            <h3>Marketing</h3>
            <p>Does your business need to reach a larger audience? We are well versed in internet advertisements, including <b>Google AdSense</b> with banner ads and YouTube pre-roll ads. We will come to you and record a professional advertisement that can reach thousands of new customers.</p>
            <a href="/services#marketing" class="btn secondary" title="Learn more about how we handle marketing">Learn More</a>
        </div>
    </section>

    <section id="features">

        <div id="live-chatbot" class="feature col" index="0">
            <h2 class="title">LIVE Chatbot</h2>
            <p class="description short">Live chatbots are a great way for your customers to ask questions without needing to hire a call center.</p>
            <p class="description long">We understand that most companies can’t afford to hire a call center to handle customers questions. Now you don’t have to, we can create a <b>LIVE Chat</b> bubble on your site where users can ask questions and get immediate responses. This bot can also do tasks for the customer.
                Is the customer waiting for a package to arrive, they can just ask <b><i>“Where is my package”</i></b> and the bot can look at they’re current orders and say <i><b>“Your package is currently in Boston MA and will arrive Thursday, March 4th around 4 P.M.”</b></i> .
            </p>
            <div class="row">
                <a href="#contact-us" class="btn primary" title="Scroll to the 'Get a quote' section">Check it Out</a>
                <div class="btn secondary">Learn More</div>
            </div>
        </div>
        <div id="point-of-sale" class="feature col" index="1">
            <h2 class="title">Point of Sale</h2>
            <p class="description short">We can create a beautiful and easy to use POS system for use both by the customer online or the employee in-store</p>
            <p class="description long">A Point of Sale (POS) system is a solution that allows small businesses to manage sales transactions, process payments, track inventory, and generate reports. With a POS system, businesses can process transactions quickly and accurately, accept different payment types, track inventory levels in real-time, and make data-driven decisions based on sales trends and performance indicators. Overall, a POS system helps small businesses improve their sales and inventory management processes, save time, reduce errors, and gain valuable insights into their operations.</p>
            <div class="row">
                <a href="#contact-us" class="btn primary" title="Scroll to the 'Get a quote' section">Check it Out</a>
                <div class="btn secondary">Learn More</div>
            </div>
        </div>
        <div id="online-ordering" class="feature col" index="2">
            <h2 class="title">Online Ordering</h2>
            <p class="description short">Your customers and employee’s will be in sync with simple, one-click ordering and booking!</p>
            <p class="description long">Online ordering is a system that allows customers to place orders for food and beverages through a restaurant's website or mobile app. With online ordering, customers can browse the menu, select items, customize their order, and pay online, all from the comfort of their own device. For restaurants, online ordering can streamline the ordering process, reduce errors, and increase sales by making it easier for customers to place orders. Restaurants can also use online ordering to collect customer data, such as email addresses and order history, which can be used for marketing and loyalty programs. Overall, online ordering is a convenient and efficient way for restaurants to provide customers with an easy way to place orders and increase revenue.</p>
            <div class="row">
                <a href="#contact-us" class="btn primary" title="Scroll to the 'Get a quote' section">Check it Out</a>
                <div class="btn secondary">Learn More</div>
            </div>
        </div>

    </section>

    <section id="what-do-you-think-banner" class="banner center col">
        <h2>What do you think?</h2>
        <p>Get started with your new brand identity today</p>
        <a href="#contact-us" class="btn primary">Get Started</a>
    </section>

    <section id="statistics">
        <div class="stat-card" style="background-image: url('/assets/img/72-hours.webp')">
            <i class="fa-solid fa-clock"></i>
            <p class="title">72</p>
            <p class="subtitle">hours</p>
            <p class="extra">The average project takes around 72 hours.</p>
        </div>
        <div class="stat-card" style="background-image: url('/assets/img/money-per-hour.webp')">
            <i class="fa-solid fa-mobile-alt"></i>
            <p class="title">100%</p>
            <p class="subtitle">mobile ready</p>
            <p class="extra">All of our websites are responsive and ready to be used on any device!</p>
        </div>
        <div class="stat-card" style="background-image: url('/assets/img/rating.webp')">
            <i class="fa-solid fa-face-smile"></i>
            <p class="title">10/10</p>
            <p class="subtitle">rating</p>
            <p class="extra">What our customers are saying!</p>
        </div>
    </section>


    <section id="reviews" class="row">
        <div class="watermark">reviews</div>
        <div class="review-container">
            <div class="reviews-slider row">
                <?php
                for ($i = 0; $i < 30; $i++) {
                    echo '<div class="col review">
                    <h3>Site #' . $i . '</h3>
                    <p>Lorem ipsum dolor sit amet consectetur. Quis enim sit in eget commodo leo. Purus vestibulum semper ac id. Non penatibus mi diam sit ridiculus. Amet ut id commodo purus urna sed condimentum sodales arcu. Purus tortor feugiat sapien morbi.</p>
                    <div class="review-score">';
                    $num = rand(2, 5);
                    for ($j = 0; $j < $num; $j++) {
                        if ($j == $num - 1) {
                            $choice = rand(0, 1);
                            switch ($choice) {
                                case 0:
                                    echo '<span class="review-pill full"></span>';
                                    break;
                                case 1:
                                    echo '<span class="review-pill half"></span>';
                                    break;
                            }
                        } else
                            echo '<span class="review-pill full"></span>';
                    }

                    for ($j = $num; $j < 5; $j++) {
                        echo '<span class="review-pill empty"></span>';
                    }

                    echo '
                    </div>
                    <div class="row" id="review-buttons">
                    <a href="#" class="btn primary">Visit Site</a>
                    <a href="#" class="btn secondary" title="Learn more about how we handle web design">Learn More</a>
                    </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>


    <section id="hosting-domains" class="banner center col">
        <h2>Hosting & Domains</h2>
        <p>Ask us about our hosting and domain services!</p>
        <div class="row">
            <a href="#contact-us" class="btn primary">Get Started</a>
            <a href="/services#hosting-domains" class="btn secondary">Learn More</a>
        </div>
    </section>

    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/contact-form.php";    ?>
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/assets/php/footer.php";    ?>

    <script src="/assets/js/min/features.min.js"></script>
    <script src="/assets/js/min/reviews.min.js"></script>

</body>

</html>