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
        include('models/Point.php');

        $screen = new Screen(200, 160); // $width $height
        $screen->fillScreen('lightGrey'); // color
        
        /**
         * Draw a pixel 
         * params ($x, $y, $color)
         */
        //$screen->drawPixel(100, 80, '#000000'); // in the middle of the screen lightgrey
        
        /**
         * Draw a line 
         * params ($x1, $y1, $x2, $y2, $color)
         */
        /*
        $screen->drawLine(0, 0, 200, 160, '#00FF00'); // From the left top to right bottom like (diagonal: \)
        $screen->drawLine(200, 0, 0, 160, '#FF0000'); // From the left top to right bottom like (diagonal: /)
        $screen->drawLine(0, 80, 200, 80, '#FFFF00'); // Horizontal line
        $screen->drawLine(100, 0, 101, 160, '#000FFF'); // Vertical line
        */

        /**
         * Draw a polygon 
         * params ($arrayPoints, $color)
         */
        $arrayPoints = [new Point(10, 40), new Point(50, 80), new Point(40, 130), new Point(20, 70)];
        $screen->drawPolygon($arrayPoints, '#FFFFFF');

        $arrayPoints = [new Point(100, 100), new Point(100, 90), new Point(160, 70), new Point(160, 100)];
        $screen->drawPolygon($arrayPoints, '#FFFF00');
        
        $arrayPoints = [new Point(60, 50), new Point(60, 90), new Point(50, 100), new Point(50, 100), new Point(80, 100), new Point(80, 60)];
        $screen->drawPolygon($arrayPoints, '#FF0000');



        $screen->show();
    ?> 

</body>
</html>

