<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geometry in PHP</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            padding: 0px; 
            width: 4px;
            height: 4px;
            background-color: rgb(240, 240, 240);
            border: 0px solid rgb(200, 200, 240);
        }
    </style>
</head>
<body>
    <?php 
        include('models/Screen.php');

        $screen = new Screen(200, 160); // $width $height
        $screen->fillScreen('lightGrey'); // color
        $screen->drawPixel(100, 80, '#000000'); // in the middle of the screen lightgrey
        $screen->show();
    ?> 

</body>
</html>

