<?php

// Render the external webpage using an iframe
$url = 'http://96.63.234.233:9002/';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            overflow: hidden; /* Prevent scrollbars */
        }
        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <iframe src="<?php echo $url; ?>" title="Map"></iframe>
</body>
</html>
