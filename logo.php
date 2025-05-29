<?php
/**
 * Logo Component with Animated Splash Text
 * 
 * This script renders a logo with animated splash text similar to Minecraft's logo.
 * Usage: Include this file where you want the logo to appear.
 */

/**
 * Get a random splash text from the JSON file
 * - If there are texts for today's date, select randomly from those
 * - If none for today, select randomly from texts without dates
 */
function get_random_splash_text() {
    $json_file = 'misc/splash_texts.json';
    
    // Check if JSON file exists
    if (!file_exists($json_file)) {
        return "Party at Alex's!"; // Fallback text
    }
    
    // Read and decode JSON file
    $splash_texts = json_decode(file_get_contents($json_file), true);
    if (!$splash_texts || !is_array($splash_texts)) {
        return "Party at Alex's!"; // Fallback text if JSON is invalid
    }
    
    // Set timezone to America/New_York (Eastern Time)
    date_default_timezone_set('America/New_York');
    
    // Get today's date in YYYY-MM-DD format
    $today = date('Y-m-d');
    
    // Debug output
    error_log("Today's date: " . $today);
    
    // Force the date to May 19, 2025 for testing
    $today = '2025-05-19';
    
    // Collect texts for today's date
    $today_texts = [];
    foreach ($splash_texts as $item) {
        if (isset($item['date']) && $item['date'] === $today) {
            $today_texts[] = $item;
        }
    }
    
    // If we have texts for today, select randomly from those
    if (count($today_texts) > 0) {
        $random_key = array_rand($today_texts);
        error_log("Selected today's text: " . $today_texts[$random_key]['text']);
        return $today_texts[$random_key]['text'];
    }
    
    // Otherwise, select from texts with no dates
    $undated_texts = [];
    foreach ($splash_texts as $item) {
        if (!isset($item['date'])) {
            $undated_texts[] = $item;
        }
    }
    
    // If we have undated texts, select randomly from those
    if (count($undated_texts) > 0) {
        $random_key = array_rand($undated_texts);
        error_log("Selected undated text: " . $undated_texts[$random_key]['text']);
        return $undated_texts[$random_key]['text'];
    }
    
    // Fallback if no suitable texts found
    return "Party at Alex's!";
}

function render_logo($splash_text = null) {
    // If no splash text provided, get a random one from the JSON file
    if ($splash_text === null) {
        $splash_text = get_random_splash_text();
    }
    
    // Generate a unique ID for this logo instance
    $logo_id = 'minecraft-logo-' . uniqid();
    
    // HTML output
    ?>
    <div class="minecraft-logo-container">
        <div class="minecraft-logo" id="<?php echo $logo_id; ?>">
            <img src="img/logo.png" alt="Logo" class="logo-image">
            <div class="splash-text"><?php echo htmlspecialchars($splash_text); ?></div>
        </div>
    </div>

    <style>
        @font-face {
            font-family: 'Minecraft';
            src: url('misc/minecraft-regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
          .minecraft-logo-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            position: relative;
            overflow: visible;
            padding: 20px 0 0 0; /* Adjusted to only have padding at the top */
        }
        
        .minecraft-logo {
            position: relative;
            display: inline-block;
            overflow: visible;
            text-align: center;
            /* Add max-width to constrain on all screens */
            width: 100%;
        }
        
        .logo-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto; /* Center the image */
        }
        
        /* Responsive constraints for the logo size */
        @media (min-width: 768px) {
            .minecraft-logo {
                max-width: 70%; /* Reduced from 80% */
            }
        }
        
        @media (min-width: 1024px) and (min-aspect-ratio: 4/3) {
            .minecraft-logo {
                max-width: 60%; /* Reduced from 70% */
            }
        }
        
        @media (min-width: 1400px) or (min-aspect-ratio: 16/9) {
            .minecraft-logo {
                max-width: 40%; /* Reduced from 50% */
            }
            
            .logo-image {
                max-height: 300px; /* Reduced from 350px */
            }
        }
        
        .splash-text {
            position: relative; /* Changed from absolute to relative */
            color: #ff0;
            font-weight: normal; /* Changed from bold to normal */
            font-family: 'Minecraft', 'Comic Sans MS', cursive, sans-serif;
            text-shadow: 2px 2px 0 #000;
            font-size: 1.5rem;
            animation: splash-animation 1s infinite ease-in-out;
            z-index: 10;
            width: max-content;
            max-width: 80vw; /* Limit width to stay within viewport */
            word-wrap: break-word;
            margin: 10px auto 0; /* Add margin to position below logo */
        }
        
        @keyframes splash-animation {
            0% { transform: scale(1.4); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1.4); }
        }
    </style>

    <script>
        // Initialize this specific logo instance
        (function() {
            const logoElement = document.getElementById('<?php echo $logo_id; ?>');
            const splashElement = logoElement.querySelector('.splash-text');
            
            // Random slight movement
            setInterval(() => {
                const randomOffsetX = Math.random() * 4 - 2; // -2 to 2 pixels
                const randomOffsetY = Math.random() * 4 - 2; // -2 to 2 pixels
                
                splashElement.style.transform = `scale(${1 + Math.sin(Date.now() / 1000) * 0.05}) translate(${randomOffsetX}px, ${randomOffsetY}px)`;
            }, 100);
            
            // Ensure splash text stays in viewport
            function checkBounds() {
                const rect = splashElement.getBoundingClientRect();
                
                // Check if splash text is outside viewport
                if (rect.right > window.innerWidth || rect.bottom > window.innerHeight) {
                    // Adjust font size to fit
                    const currentSize = parseFloat(window.getComputedStyle(splashElement).fontSize);
                    splashElement.style.fontSize = (currentSize * 0.9) + 'px';
                }
            }
            
            // Check bounds on load and window resize
            window.addEventListener('load', checkBounds);
            window.addEventListener('resize', checkBounds);
        })();
    </script>
    <?php
}
?>