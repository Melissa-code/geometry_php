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
    public function drawPixel($x, $y, $color): void
    {
        if ($y < count($this->pixels) && $y >= 0 && $x < count($this->pixels[0]) && $x >= 0) {
            $this->pixels[$y][$x] = $color; 
        }
    }

    

}