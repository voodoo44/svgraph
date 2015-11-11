<?php

//require_once 'svgelement.class.php';

/**
 * Class Line
 */
class Line implements SVGElement {

    /**
     * @var int
     */
    protected $x1 = 0;

    /**
     * @var int
     */
    protected $x2 = 0;

    /**
     * @var int
     */
    protected $y1 = 0;

    /**
     * @var int
     */
    protected $y2 = 0;

    /**
     * @var string
     */
    protected $style = '';

    /**
     * Builds the new object and setups initial properties
     */
    public function __construct() {

        $this->x1 = 0;
        $this->y1 = 0;
        $this->x2 = 200;
        $this->y2 = 200;
        $this->style = 'stroke:rgb(255,0,0);stroke-width:2';
    }

    /**
     * renders the object we want to display
     *
     * @param $height
     *
     * @return SimpleXMLElement
     */
    public function render($height) {

        // because of the viewport in svg we need to 'flip' y1 and y2
        $this->y1 = $height - $this->y1;
        $this->y2 = $height - $this->y2;

        try {
            $lineObject = simplexml_load_string('<line x1="' . $this->x1 .'" y1="' . $this->y1 .'" x2="' . $this->x2 .'" y2="' . $this->y2 .'" style="' . $this->style . '" />');
        }
        catch(Exception $ex) {
            $lineObject =  simplexml_load_string('<line x1="0" y1="0" x2="0" y2="0" />');
        }

        return $lineObject;
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function setOptions(array $options = array()) {

        $this->x1 = $options['x1'];
        $this->x2 = $options['x2'];
        $this->y1 = $options['y1'];
        $this->y2 = $options['y2'];

        return $this;
    }

}