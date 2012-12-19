<?php
class Grid {

    protected $_aElements;

    protected $_grid;

    protected $_size;

    /**
     * Initializes the Square-Chart Object with size 500x500px
     */
    public function __construct() {
        $this->_size['width'] = '500';
        $this->_size['height'] = '500';
    
        $this->_grid = new SimpleXMLElement('<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500px" height="500px"></svg>');
    }
    
    /**
     * Sets the size of the Chart
     * @param String $width
     * @param String $height
     */
    public function setSize($width='800', $height='600') {
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
     *
     * @param array An Array of Objects containing the SVG-Elements to add
     */
    public function addElements(array $svgElements) {

        foreach($svgElements as $svgElement) {

            $this->_aElements[] = $svgElement;
        }

        return $this;
    }

    public function render() {

        $oXml = $this->_grid;
        $newXml = $oXml->addChild('g');

        foreach($this->_aElements as $aElement) {

            $newChild = $newXml->addChild('line');
            foreach ($aElement->render()->attributes() as $sKey => $sValue) {
                $newChild->addAttribute($sKey, $sValue);
            }
        }
        echo $oXml->asXml();
    }

}