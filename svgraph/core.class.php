<?php

class Core {
    /**
     * Get an Object of type $sGraph
     * @param String $sGraph
     * @param String $folder
     * @throws Exception the error-message
     * @return $sGraph|boolean false if object can not be generated - else $sGraph-object
     */
    public static function getEmptyObj($sGraph = 'square', $folder = '2D')
    {
        if(file_exists('svgraph/' . $folder . '/' . $sGraph . '.class.php') !== true) {
            throw new Exception('GraphClass "'.$sGraph.'" is missing.');
        } else {
            require_once $folder . '/' .$sGraph . '.class.php';
            return new $sGraph;
        }

        return false;
    }
}