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
        
        /**
         * Draw a pixel 
         */
        //$screen->drawPixel(100, 80, '#000000'); // in the middle of the screen lightgrey
        
        /**
         * Draw a line ($x1, $y1, $x2, $y2, $color)
         */
        $screen->drawLine(0, 0, 200, 160, '#00FF00'); // From the left top to right bottom like (diagonal: \)
        $screen->drawLine(200, 0, 0, 160, '#FF0000'); // From the left top to right bottom like (diagonal: /)
        $screen->drawLine(0, 80, 200, 80, '#FFFF00'); // Horizontal line
        $screen->drawLine(100, 0, 101, 160, '#000FFF'); // Vertical line
        
        $screen->show();
    ?> 

</body>
</html>

