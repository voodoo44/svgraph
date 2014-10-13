<?php

/**
 * Class Grid
 */
class Grid {

    /**
     * @var array
     */
    protected $elementsList = array();

    /**
     * @var SimpleXMLElement
     */
    protected $gridObject;

    /**
     * @var array
     */
    protected $sizeField = array();

    /**
     * Initializes the Square-Chart Object with size 500x500px
     */
    public function __construct() {
        $this->sizeField['width'] = '500';
        $this->sizeField['height'] = '500';
    
        $this->gridObject = new SimpleXMLElement('<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="500px" height="500px"></svg>');
    }

    /**
     * Sets the size of the Chart
     *
     * @param String $width
     * @param String $height
     *
     * @return $this
     */
    public function setSizeField($width='800', $height='600') {
        $this->sizeField['width'] = $width;
        $this->sizeField['height'] = $height;
        $this->gridObject = null;
        $this->gridObject = new SimpleXMLElement(
                '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN"
                           "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="'.$width.'" height="'.$height.'"></svg>'
        );
    
        return $this;
    }

    /**
     * Initiates a Gridobject and sets the Grid
     *
     * @param Array $gridField
     *
     * @return $this
     */
    public function setGridObject($gridField = array()) {
        $xmlObject = $this->gridObject;
        $xmlGridObject = $xmlObject->addChild('g');
        $xmlGridObject->addAttribute('id', 'grid');
        $xmlGridObject->addAttribute('stroke', 'black');
    
        // x-Line
        $xmlGridDetailsObject = $xmlGridObject->addChild('line');
        $xmlGridDetailsObject->addAttribute('x1', '0');
        $xmlGridDetailsObject->addAttribute('y1', '0');
        $xmlGridDetailsObject->addAttribute('x2', $this->sizeField['width']);
        $xmlGridDetailsObject->addAttribute('y2', '0');
        $xmlGridDetailsObject->addAttribute('style', 'stroke-dasharray:1,' . $gridField['x']['quadSize'] . ';stroke-width:' . $this->sizeField['height']*40 . ';');
    
        // y-Line
        $xmlGridDetailsObject = $xmlGridObject->addChild('line');
        $xmlGridDetailsObject->addAttribute('x1', '0');
        $xmlGridDetailsObject->addAttribute('y1', $this->sizeField['height']);
        $xmlGridDetailsObject->addAttribute('x2', '0');
        $xmlGridDetailsObject->addAttribute('y2', '0');
        $xmlGridDetailsObject->addAttribute('style', 'stroke-dasharray:1,' . $gridField['y']['quadSize'] . ';stroke-width:' . $this->sizeField['width']*40 . ';');
    
        return $this;
    }

    /**
     * Adds an Element to the Element-Chain
     *
     * @param array An Array of Objects containing the SVG-Elements to add
     *
     * @return $this
     */
    public function addElements(array $svgElements) {

        foreach($svgElements as $svgElement) {

            $this->elementsList[] = $svgElement;
        }

        return $this;
    }

    /**
     * Adds an Element to the Element-Chain
     *
     * @param SVGElement $elementObject
     *
     * @return $this
     */
    public function addElement(SVGElement $elementObject) {

        $this->elementsList[] = $elementObject;

        return $this;
    }

    /**
     *
     * @return $this
     */
    public function render() {

        $gridObject = $this->gridObject;
        $newXml = $gridObject->addChild('g');

        foreach($this->elementsList as $elementObject) {

            // the rendered element
            $rendered = $elementObject->render($this->sizeField['height']);
            $newChild = $newXml->addChild($rendered->getName());
            foreach ($rendered->attributes() as $sKey => $sValue) {
                $newChild->addAttribute($sKey, $sValue);
            }

            unset($rendered);
        }
        echo $gridObject->asXml();

        return $this;
    }

}