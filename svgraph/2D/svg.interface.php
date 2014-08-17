<?php

/**
 * Interface sets the required functions for each 2D SVG-Class
 * @author Gunter Thomas
 */
interface Svg {
    /**
     * @return mixed
     */
    public function getSVG();

    /**
     * @param string $width
     * @param string $height
     *
     * @return mixed
     */
    public function setSize($width='800', $height='600');

    /**
     * @param array $aElement
     *
     * @return mixed
     */
    public function addElement($aElement = array());

    /**
     * @param array $aGrid
     *
     * @return mixed
     */
    public function setGrid($aGrid = array());
}