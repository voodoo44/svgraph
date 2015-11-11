<?php

/**
 * Class Core
 */
class Core {

    /**
     * Initializes empty object to draw
     *
     * @param string $graph
     *
     * @return SVGElement
     *
     * @throws Exception
     */
    public static function buildObject($graph = 'Line') {


        return new $graph;
    }
}