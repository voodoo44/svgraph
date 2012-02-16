<?php
/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('svgraph/core.class.php');

/* FILL DATA */
$aGrid['x'] = array('lineSize' => '1', 'quadSize' => '20');
$aGrid['y'] = array('lineSize' => '1', 'quadSize' => '20');

/*$aElementToAdd['type'] = 'circle';
$aElementToAdd['cx'] = '50';
$aElementToAdd['cy'] = '100';
$aElementToAdd['r'] = '10';
$aElementToAdd['stroke'] = 'black';
$aElementToAdd['stroke-width'] = '1';
$aElementToAdd['fill'] = 'red';

$aElementToAdd2['type'] = 'circle';
$aElementToAdd2['cx'] = '20';
$aElementToAdd2['cy'] = '210';
$aElementToAdd2['r'] = '10';
$aElementToAdd2['stroke'] = 'black';
$aElementToAdd2['stroke-width'] = '1';
$aElementToAdd2['fill'] = 'red';

$aElementToAdd3['type'] = 'circle';
$aElementToAdd3['cx'] = '450';
$aElementToAdd3['cy'] = '120';
$aElementToAdd3['r'] = '10';
$aElementToAdd3['stroke'] = 'black';
$aElementToAdd3['stroke-width'] = '1';
$aElementToAdd3['fill'] = 'red';*/

$aElementToAdd['type'] = 'line';
$aElementToAdd['x1'] = '50';
$aElementToAdd['y1'] = '100';
$aElementToAdd['x2'] = '50';
$aElementToAdd['y2'] = '200';

$aElementToAdd2['type'] = 'line';
$aElementToAdd2['x1'] = '50';
$aElementToAdd2['y1'] = '200';
$aElementToAdd2['x2'] = '150';
$aElementToAdd2['y2'] = '400';

/* GENERATE OBJECTS */
$obj = Core::getEmptyObj('line');

if($obj !== false) {
    $obj->setSize("800", "600");
    $obj->setGrid($aGrid);
    $mySvg = $obj->addElement($aElementToAdd)->addElement($aElementToAdd2)->getSVG();

    echo $mySvg;
} else {
    echo 'there was an error creating empty svg object';
}