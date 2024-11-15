<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party at Alex's</title>
    <link rel="icon" type="image/x-icon" href="./favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: rgb(39, 38, 38);
        }

        .bg-grid {
            background-size: 40px 40px;
            background-color: white;
            background-image:
                linear-gradient(to right, rgb(225, 225, 225) 2px, transparent 1px),
                linear-gradient(to bottom, rgb(225, 225, 225) 2px, transparent 1px);
        }

        .logo-cell img {
            width: 320px;
            height: auto;
            margin: auto;
            display: block;
        }

        .wide-cell img {
            width: 480px;
            height: auto;
            margin: auto;
            display: block;
        }

        .bg-grid.container {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Custom row for specific alignment, avoiding Bootstrap’s .row */
        .custom-row {
            display: flex; /* Enable Flexbox for centering */
            justify-content: center; /* Center the columns horizontally */
        }

        .pack-row {
            margin-bottom: 8px;
        }

        .custom-col {
            flex: 0 1 auto; /* Allow columns to resize naturally */
            width: fit-content;
            padding: 5px;
        }

        .datapack-cell img {
            width: 480px;
            height: auto;
            margin: 0px;
            padding: 0px;
            display: block;
        }

        .wide-cell {
            display: flex;
            justify-content: center;
            padding: 10px; /* Adds some space around each cell */
            width: 100%;
        }

        .datapack-cell {
            display: flex;
            justify-content: center;
            padding: 5px 2px; /* Adds some space around each cell */
        }

        .small-cell {
            display: flex;
            justify-content: center;
            max-width: 240px;
            width: fit-content;
        }

        .small-cell img {
            width: 100%;
            height: auto;
            display: block;
        }

        .section-heading h2,
        .section-heading h4 {
            margin: auto;
            display: block;
            width: fit-content;
        }

        .main-wrapper {
            padding-top: 3%;
        }

        .server-map {
            width: 100%;
            max-width: 90vw;
            height: 60vh;
            margin: auto;
            display: block;
        }

        /* Navbar styling */
        .navbar {
            background-color: rgb(27, 27, 29);
            padding: 10px 0;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo-button {
            margin-right: 15px;
        }

        .navbar-logo {
            width: 50px;
            height: auto;
        }

        .nav-link {
            color: white;
            margin: 0 10px;
            font-size: 18px;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #d3d3d3;
        }

        /* Ensure navbar sticks to the top */
        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        /* Additional styling for the navbar header */
        .nav-header {
            background-color: rgb(27, 27, 29);
        }
    </style>
</head>

<body>
    <nav class="navbar sticky-top">
            <div class="container d-flex justify-content-center align-items-center">
                <a class="navbar-brand logo-button"><img src="./img/logo.png" alt="Logo" class="navbar-logo"></a>
                <a href="#live-map" class="nav-link">Live Map</a>
                <a href="#resource-pack" class="nav-link">Resource Pack</a>
                <a href="#data-packs" class="nav-link">Data Packs</a>
                <a href="#contact" class="nav-link">Contact</a>
            </div>
    </nav>
    <div class="bg-grid">
        <div class="main-wrapper container">
            <div class="section-heading">
                <h2>Live Map</h2>
            </div>
            <div class="wide-cell">
                <iframe class="server-map" src="http://map.partyatalexs.xyz//"></iframe>
            </div>
            <br><br>
                
            <div class="section-heading">
                <h2>Recommended Resource Pack</h2>
            </div>
            <div class="wide-cell"><img src="./img/pack.png" /></div>
            <br><br>

            <div class="section-heading">
                <h2>Server Data Packs</h2>
            </div>
            <div class="container">
                <div class="row" id="datapack-row">
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/armored-elytra.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/cauldron-concrete.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/cauldron-mud.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/classic-fishing-loot.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/custom-nether-portals.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/double-shulker-shells.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/fast-leaf-decay.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/graves.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/husks-drop-sand.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/mini-blocks.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/more-mob-heads.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/name-colors.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/player-head-drops.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/silence-mobs.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/timber.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/unlock-all-recipes.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/wandering-trader-announcements.png" /></div>
                    <div class="col-12 col-lg-6 datapack-cell"><img src="./img/data/wandering-trades.png" /></div>
                </div>
            </div>
            <br><br>

            <div class="section-heading">
                <h2>New Crafting Recipes</h2>
                <div class="container">
                    <div class="row" id="datapack-row">
                        <div class="col-12 col-lg-6 datapack-cell"><img src="./img/craft/rotten flesh to leather.png" /></div>
                        <div class="col-12 col-lg-6 datapack-cell"><img src="./img/craft/craftable gravel.png" /></div>
                        <div class="col-12 col-lg-6 datapack-cell"><img src="./img/craft/craftable horse armor.png" /></div>
                        <div class="col-12 col-lg-6 datapack-cell"><img src="./img/craft/craftable name tags.png" /></div>
                        <div class="col-12 col-lg-6 datapack-cell"><img src="./img/craft/unpackable wool.png" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>