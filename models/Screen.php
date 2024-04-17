<?php

class Screen {

    private array $pixels; 

    /**
     * Create the matrix (array pixels of lines)
     */
    public function __construct(int $width, int $height)
    {
        $this->pixels = []; 
        // Create the lines 
        for ($i = 0; $i < $height; $i++) {
            $line = []; 
            // Create the columns 
            for ($j = 0; $j < $width; $j++) {
                $line[] = '#FFFFFF'; 
            }
            $this->pixels[] = $line; 
        }
    }

    /**
     * Fill the screen with a color
     */
    public function fillScreen(string $color): void
    {
        for ($i = 0; $i < count($this->pixels); $i++) {
            for ($j = 0; $j < count($this->pixels[$i]); $j++) {
                $this->pixels[$i][$j] = $color; 
            }
        }
    }

    /**
     * Show the screen (echo table)
     */
    public function show(): void
    {
        $render = '<table>'; 
        for ($i = 0; $i < count($this->pixels); $i ++) {
            $render .= '<tr>'; // line 
            for ($j = 0; $j < count($this->pixels[$i]); $j++) {
                $render .= '<td style="background-color:' .$this->pixels[$i][$j].';"></td>';
            }
            $render .= '</tr>'; 
        }
        $render .= '</table>';
        echo $render; 
    }

    /**
     * Draw a pixel with a color and 2 points $x and $y
     * Check if $x and $y are in the matrix 
     */
    public function drawPixel(int $x, int $y, string $color): void
    {
        if ($y < count($this->pixels) && $y >= 0 && $x < count($this->pixels[0]) && $x >= 0) {
            $this->pixels[$y][$x] = $color; 
        }
    }

    /**
     * Draw a straight line 
     * y = ax + b 
     * a = delta y / delta x
     * b = y1 - a x1
     */
    public function drawLine($x1, $y1, $x2, $y2, $color)
    {
        //y=ax+b
        // a = delta y / delta x
        // b = y1-a x1
        if ($x1 > $x2) {
            $x = $x1;
            $x1 = $x2;
            $x2 = $x;
            $y = $y1;
            $y1 = $y2;
            $y2 = $y;
        }
        if ($x1==$x2)
        {
            if ($y1>$y2)
            {
                $t=$y1;
                $y1=$y2;
                $y2=$t;
            }
            for($i = $y1;$i<=$y2;$i++)
                $this->drawPixel($x1,$i,$color);
            return;
        }
        $a = ($y2 - $y1) / ($x2 - $x1);
        $b = $y1 - $a * $x1;
        $goy = 0;
        if (abs($y2 - $y1) > abs($x2 - $x1)) {
            $goy = 1;
            if ($y1 > $y2) {
                $x = $x1;
                $x1 = $x2;
                $x2 = $x;
                $y = $y1;
                $y1 = $y2;
                $y2 = $y;
            }
        }

        if ($goy == 0)
            for ($x = $x1; $x <= $x2; $x++) {
                $y = intval($a * $x + $b);
                $this->drawPixel($x, $y, $color);
            }
        else
            for ($y = $y1; $y <= $y2; $y++) {
                $x = intval(($y - $b) / $a);
                $this->drawPixel($x, $y, $color);
            }
    }

    /**
     * Draw a polygon 
     */
    public function drawPolygon($arrayPoints, $color)
    {
        for ($i = 0; $i < count($arrayPoints) - 1; $i++) {
            $p1 = $arrayPoints[$i];
            $p2 = $arrayPoints[$i + 1];
            $this->drawLine($p1->x, $p1->y, $p2->x, $p2->y, $color);
        }

        // connection 1er et dern point
        $dernier = count($arrayPoints) - 1;
        $p1 = $arrayPoints[$dernier];
        $p2 = $arrayPoints[0];
        $this->drawLine($p1->x, $p1->y, $p2->x, $p2->y, $color);
    }
}