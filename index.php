<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party at Alex's</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">

        <!-- HEADER AND SPLASH TEXT -->
        <div id="header-section">
            <?php 
                include('logo.php');
                render_logo();
            ?>
        </div>
        
        <!-- NAVBAR -->
        <div class="navbar-wrapper">            <nav class="navbar">
                <a href="#playnow" class="btn-play"><img src="img/btn/btn-play.png" alt="Play Now"></a>
                <a href="#rules" class="btn-rules"><img src="img/btn/btn-rules.png" alt="Rules"></a>
                <a href="http://map.partyatalexs.xyz" class="btn-map" target="_blank" rel="noopener noreferrer"><img src="img/btn/btn-map.png" alt="Live Map"></a>
                <a href="#mods" class="btn-mods"><img src="img/btn/btn-mods.png" alt="Modpack"></a>
            </nav>
        </div>
        
        <main>
            <!-- ABOUT SECTION -->
            <div class="section-container" id="about">
                <section class="about">
                    <h2 style="color: #ff0;">Welcome!</h2>
                    <p>Party at Alex's is a 24/7 modded Minecraft server. The game runs on version 1.21.1, but features backported content
                        from future game versions.
                    </p>
                    <br>
                    <p>
             <!-- <span class="yellow-splash"><a href="./files/dummy.txt" download>Modrinth launcher</a></span>, as it will make -->

                        The Party Pack modpack
                        includes proximity voice chat, tons of quality of life features, overhaul to world
                        generation (including new biomes and structures), new mobs, new items, new blocks overhauled fishing and farming,
                        multiple new dimensions to explore, and more!
                    </p>
                </section>
            </div>

            <!-- NEWS SECTION -->
            <div class="section-container" id="news">
                <section class="news">
                    <h2 style="color: #ff0;">New Modpack Version Available! (6-22-2025)</h2>
                    <p>The modpack has been updated to V2! New mods are listed below and the updated pack can be downloaded in the "How to Get Started" section.</p>
                    <p></p>
                    <?php
                    $news = json_decode(file_get_contents('misc/new.json'), true);
                    foreach ($news as $newsItem) {
                        $image = $newsItem['image'] ? "img/mods/{$newsItem['image']}" : "img/black-square.png";
                        $link = $newsItem['link'];
                        $title = $newsItem['title'];
                        $subtitle = $newsItem['info'];
                        echo "<a href='$link' target='_blank' class='mod-section news-item'>
                                <div class='mod-image'>
                                    <img src='$image' alt='$title' loading='lazy'>
                                </div>
                                <div class='mod-details'>
                                    <h3>$title</h3>
                                    <p>$subtitle</p>
                                </div>
                              </a>";
                    }
                    ?>
                </section>
            </div>

            <!-- PLAY NOW SECTION -->
            <div class="section-container" id="playnow">
                <section class="play-now">
                    <h2 style="color: #ff0;">How to Get Started</h2>
                    <p id="countdown"></p>
                    <script>
                        const countdownElement = document.getElementById('countdown');
                        const partyStartDate = new Date('2025-06-03T18:00:00'); // Set the party start date and time

                        function updateCountdown() {
                            const now = new Date();
                            const centralTimeOffset = -6; // Central Time offset from UTC
                            const nowCentralTime = new Date(now.getTime() + (now.getTimezoneOffset() * 60000) + (centralTimeOffset * 3600000));
                            const timeRemaining = partyStartDate - nowCentralTime;

                            if (timeRemaining > 0) {
                                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                                const pad = (num) => String(num).padStart(2, '0');

                                countdownElement.textContent = `The party begins in ${pad(days)}:${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
                                countdownElement.style.display = 'block';

                                // Add line break only if it doesn't already exist
                                if (!countdownElement.nextElementSibling || countdownElement.nextElementSibling.tagName !== 'BR') {
                                    countdownElement.insertAdjacentHTML('afterend', '<br>');
                                }
                            } else {
                                countdownElement.style.display = 'none';
                            }
                        }

                        setInterval(updateCountdown, 1000);
                    </script>
                    <p>
                        Download and install the
                        <span class="yellow-splash"><a href="https://modrinth.com/app">Modrinth launcher</a></span> and log into your Minecraft
                        account, as it will make it much easier to install the 
                        <span class="yellow-splash"><a href="https://www.dropbox.com/scl/fi/0s12um21oz675njo3yqp9/Party-Pack-2.0.0.mrpack?rlkey=catkmpgvns44nqj37vrz1u7zt&st=d4ni2okv&dl=1">Party Pack</a></span> modpack.
                    </p>
                    <br>
                    <p>
                        After installing Modrinth and booting into the Party Pack instance, take a moment to hop into a singleplayer world
                        and press "V" to set up your proximity voice chat and in-game audio settings, and familiarize yourself with any
                        mod-related keybinds/controls.
                    </p>
                    <br>
                    <p>
                        To find biomes and structures added by the modpack, you must venture out beyond the bounds of the Oldlands,
                        which are defined on the livemap.
                    </p>
                    <br>
                    <p>
                        Keep an eye on the server's flavor text in the Multiplayer menu for important announcements and updates.
                    </p>
                </section>
            </div>

            <!-- RULES SECTION -->
            <div class="section-container" id="rules">
                <section class="rules">
                    <h2 style="color: #ff0;">Rules</h2>
                    <p>1. Read the room.<p>
                    <p>2. For more clarity on the above rule, use your head.</p>
                </section>
            </div>

            <!-- MODS SECTION -->
            <div class="section-container" id="mods">
                <section class="mods">
                    <h2 style="color: #ff0;">Mods & Datapacks</h2>
                    <div class='search-container'>
                        <input type='text' id='mod-search' placeholder='Search mods...'>
                    </div>
                    <p></p>
                    <?php
                    $mods = json_decode(file_get_contents('misc/mods.json'), true);
                    foreach ($mods as $mod) {
                        $image = $mod['image'] ? "img/mods/{$mod['image']}" : "img/black-square.png";
                        $link = $mod['link'];
                        $title = $mod['title'];
                        $subtitle = $mod['info'];
                        echo "<a href='$link' target='_blank' class='mod-section'>
                                <div class='mod-image'>
                                    <img src='$image' alt='$title' loading='lazy'>
                                </div>
                                <div class='mod-details'>
                                    <h3>$title</h3>
                                    <p>$subtitle</p>
                                </div>
                              </a>";
                    }
                    ?>
                </section>
            </div>
        </main>
    </div>

    <script>
        // JavaScript to handle the sticky navbar behavior
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const navbarWrapper = document.querySelector('.navbar-wrapper');
            const headerSection = document.getElementById('header-section');
            
            // Get the position where the navbar should become sticky
            const stickyPosition = headerSection.offsetTop + headerSection.offsetHeight;
            
            // Check if we've scrolled past the header
            if (window.pageYOffset >= stickyPosition) {
                navbar.classList.add('sticky');
                navbarWrapper.classList.add('has-sticky');
            } else {
                navbar.classList.remove('sticky');
                navbarWrapper.classList.remove('has-sticky');
            }
        });

        // Ensure <a> tags expand to the size of their images dynamically
        document.addEventListener('DOMContentLoaded', function() {
            const navbarLinks = document.querySelectorAll('.navbar a');

            navbarLinks.forEach(link => {
                const img = link.querySelector('img');
                if (img) {
                    const adjustLinkSize = () => {
                        link.style.width = img.offsetWidth + 'px';
                        link.style.height = img.offsetHeight + 'px';
                    };

                    // Adjust size immediately if the image is already loaded
                    if (img.complete) {
                        adjustLinkSize();
                    } else {
                        img.onload = adjustLinkSize;
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('mod-search');
            const modSections = document.querySelectorAll('.mod-section:not(.news-item)');
            const modsContainer = document.querySelector('.mods');

            const noModsFound = document.createElement('div');
            noModsFound.id = 'no-mods-found';
            noModsFound.textContent = 'No mods found';
            noModsFound.style.display = 'none';
            noModsFound.style.textAlign = 'center';
            noModsFound.style.color = '#ffffff';
            modsContainer.appendChild(noModsFound);

            searchInput.addEventListener('input', function() {
                const query = searchInput.value.toLowerCase();
                let hasResults = false;

                modSections.forEach(section => {
                    const title = section.querySelector('h3').textContent.toLowerCase();
                    const subtitle = section.querySelector('p').textContent.toLowerCase();

                    if (title.includes(query) || subtitle.includes(query)) {
                        section.style.display = 'flex';
                        hasResults = true;
                    } else {
                        section.style.display = 'none';
                    }
                });

                noModsFound.style.display = hasResults ? 'none' : 'block';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const newsSearchInput = document.getElementById('news-search');
            const newsSections = document.querySelectorAll('.news-item');
            const newsContainer = document.querySelector('.news');

            const noNewsFound = document.createElement('div');
            noNewsFound.id = 'no-news-found';
            noNewsFound.textContent = 'No news found';
            noNewsFound.style.display = 'none';
            noNewsFound.style.textAlign = 'center';
            noNewsFound.style.color = '#ffffff';
            newsContainer.appendChild(noNewsFound);

            newsSearchInput.addEventListener('input', function() {
                const query = newsSearchInput.value.toLowerCase();
                let hasResults = false;

                newsSections.forEach(section => {
                    const title = section.querySelector('h3').textContent.toLowerCase();
                    const subtitle = section.querySelector('p').textContent.toLowerCase();

                    if (title.includes(query) || subtitle.includes(query)) {
                        section.style.display = 'flex';
                        hasResults = true;
                    } else {
                        section.style.display = 'none';
                    }
                });

                noNewsFound.style.display = hasResults ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>