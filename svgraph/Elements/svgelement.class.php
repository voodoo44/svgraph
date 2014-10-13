<?php

/**
 * Interface SVGElement
 */
interface SVGElement {

    /**
     * renders the object we want to display
     *
     * @param $height
     *
     * @return SimpleXMLElement
     */
    public function render($height);

    /**
     * @param array $options
     *
     * @return $this
     */
    public function setOptions(array $options = array());
}