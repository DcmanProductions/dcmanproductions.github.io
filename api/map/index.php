<!doctype html>
<html>

<head>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->

    <script>
        const lat = <?php echo $_GET['lat']; ?>;
        const long = <?php echo $_GET['long']; ?>;
    </script>
    <script src="/assets/js/min/map.min.js"></script>


    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
</body>

</html>