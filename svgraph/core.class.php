<?php

/**
 * Class Core
 */
class Core {

    /**
     * Initializes empty object to draw
     *
     * @param string $sGraph
     *
     * @return SVGElement
     *
     * @throws Exception
     */
    public static function buildObject($sGraph = 'line')
    {
        if (file_exists('svgraph/Elements/' . $sGraph . '.class.php') === false) {
            throw new Exception('GraphClass "'.$sGraph.'" is missing.');
        }

        require_once 'Elements/' .$sGraph . '.class.php';
        return new $sGraph;
    }
}