<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Demo - Party at Alex's</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        /* Additional styles for demo page */
        .demo-container {
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }
        
        .logo-demo-box {
            border: 3px solid #555;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
        }
        
        h1, h2 {
            text-align: center;
            color: #333;
        }
        
        .custom-splash {
            margin-top: 40px;
        }
        
        .date-test {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        
        .explanation {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section-container">
            <h1>Logo Component Demo</h1>
            <p class="tagline">Demonstrating the Minecraft-style splash text</p>
        </div>
        
        <div class="navbar-wrapper">
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Back to Main Site</a></li>
                </ul>
            </nav>
        </div>
        
        <main>
            <div class="section-container">
                <h2>Random Splash Text from JSON</h2>
                <p>This is the logo with random splash text from splash_texts.json:</p>
                
                <div class="logo-demo-box">
                    <?php 
                        include('logo.php');
                        render_logo(); 
                    ?>
                </div>
                
                <div class="explanation">
                    <h3>How It Works:</h3>
                    <p>The splash text is randomly selected from a JSON file with these rules:</p>
                    <ul>
                        <?php 
                            // Set timezone to America/New_York (Eastern Time)
                            date_default_timezone_set('America/New_York');
                            // Force the date to May 19, 2025 for testing
                            $display_date = '2025-05-19';
                        ?>
                        <li>Today's date is <strong><?php echo $display_date; ?></strong> (YYYY-MM-DD format)</li>
                        <li>If splash texts exist for today's date, one will be randomly chosen from that set</li>
                        <li>If no splash texts exist for today, one will be randomly chosen from texts with no date</li>
                    </ul>
                </div>
                
                <h2>Date-Specific Splash Texts</h2>
                <p>Here are examples of how splash texts would appear on specific dates:</p>
                
                <?php
                // Display date-specific splash texts from the JSON file
                $json_file = 'misc/splash_texts.json';
                $splash_texts = json_decode(file_get_contents($json_file), true);
                
                // Group texts by date
                $date_grouped = [];
                foreach ($splash_texts as $text) {
                    if (isset($text['date'])) {
                        $date = $text['date'];
                        if (!isset($date_grouped[$date])) {
                            $date_grouped[$date] = [];
                        }
                        $date_grouped[$date][] = $text['text'];
                    }
                }
                
                // Display the date-specific texts
                foreach ($date_grouped as $date => $texts) {
                    echo '<div class="date-test">';
                    echo '<h3>Texts for ' . $date . ':</h3>';
                    echo '<ul>';
                    foreach ($texts as $text) {
                        echo '<li>"' . htmlspecialchars($text) . '"</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
                
                <h2>Custom Text Examples</h2>
                
                <div class="logo-demo-box custom-splash">
                    <?php render_logo("Manual override text!"); ?>
                    <p class="explanation">You can still manually set the text by passing a parameter to render_logo()</p>
                </div>
                
                <h2>Contained in Smaller Div</h2>
                <p>The logo can be contained in any sized div:</p>
                
                <div style="width: 50%; margin: 0 auto;">
                    <div class="logo-demo-box">
                        <?php render_logo(); ?>
                    </div>
                </div>
            </div>
        </main>
        
        <div class="section-container">
            <footer>
                <p>&copy; <?php echo date('Y'); ?> Party at Alex's. All rights reserved.</p>
                <p><a href="index.php">Back to Main Site</a></p>
            </footer>
        </div>
    </div>
</body>
</html>