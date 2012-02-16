<?php

/**
 * Class creates a Square-Object and returns it as SVG
 * @author Gunter Thomas
 */
Class Line {
    /**
     * The Gridobject itself
     * @var String
     */
    protected $_grid = null;

    /**
     * The Gridelements
     * @var Array
     */
    protected $_aElements = array();

    /**
     * The size of the Chart
     * @var Array
     */
    protected $_size = array();

    /**
     * Initializes the Square-Chart Object with size 500x500px
     */
    public function __construct() {
        $this->_size['width'] = "500";
        $this->_size['height'] = "500";

        $this->_grid = new SimpleXMLElement('<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500px" height="500px"></svg>');
    }

    /**
     * Sets the size of the Chart
     * @param String $width
     * @param String $height
     */
    public function setSize($width="800", $height="600") {
        $this->_size['width'] = $width;
        $this->_size['height'] = $height;
        $this->_grid = null;
        $this->_grid = new SimpleXMLElement(
                           '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN"
                           "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="'.$width.'" height="'.$height.'"></svg>'
                        );
        
        return $this;
    }

    /**
     * Adds an Element to the Chart
     * @param Array $aElement
     */
    public function addElement($aElement = array()) {
        $aElement['y1'] = $this->_size['height'] - $aElement['y1'];
        $aElement['y2'] = $this->_size['height'] - $aElement['y2'];
        $this->_aElements[] = $aElement;
        
        return $this;
    }

    /**
     * Initiates a Gridobject and sets the Grid
     * @param Array $aGrid
     */
    public function setGrid($aGrid = array()) {
        $oXml = $this->_grid;
        $oXmlGrid = $oXml->addChild('g');
        $oXmlGrid->addAttribute('id', 'grid');
        $oXmlGrid->addAttribute('stroke', 'black');

        // x-Line
        $oXmlGridDetails = $oXmlGrid->addChild('line');
        $oXmlGridDetails->addAttribute('x1', '0');
        $oXmlGridDetails->addAttribute('y1', '0');
        $oXmlGridDetails->addAttribute('x2', $this->_size['width']);
        $oXmlGridDetails->addAttribute('y2', '0');
        $oXmlGridDetails->addAttribute('style', 'stroke-dasharray:1,' . $aGrid['x']['quadSize'] . ';stroke-width:' . $this->_size['height']*40 . ';');

        // y-Line
        $oXmlGridDetails = $oXmlGrid->addChild('line');
        $oXmlGridDetails->addAttribute('x1', '0');
        $oXmlGridDetails->addAttribute('y1', $this->_size['height']);
        $oXmlGridDetails->addAttribute('x2', '0');
        $oXmlGridDetails->addAttribute('y2', '0');
        $oXmlGridDetails->addAttribute('style', 'stroke-dasharray:1,' . $aGrid['y']['quadSize'] . ';stroke-width:' . $this->_size['width']*40 . ';');
        
        return $this;
    }

    /**
     * Returns the SVG-Code of the created Chart
     * @return SVG-Chart as a String
     */
    public function getSVG() {
        $oXmlGrid = $this->_grid->g;
        $aElements = $this->_aElements;

        foreach($aElements as $aElement) {
            $oXmlGridChild = $oXmlGrid->addChild($aElement['type']);
            unset($aElement['type']);
            foreach($aElement as $key => $value) {
                $oXmlGridChild->addAttribute($key, $aElement[$key]);
            }
        }

        return $this->_grid->asXml();
    }
}