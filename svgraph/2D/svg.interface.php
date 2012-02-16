<?php

/**
 * Interface sets the required functions for each 2D SVG-Class
 * @author Gunter Thomas
 */
interface Svg {
    public function getSVG();
    public function setSize($width="800", $height="600");
    public function addElement($aElement = array());
    public function setGrid($aGrid = array());
}