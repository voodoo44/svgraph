<?php
/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('svgraph/core.class.php');

/* FILL DATA */
$aGrid['x'] = array('lineSize' => '1', 'quadSize' => '20');
$aGrid['y'] = array('lineSize' => '1', 'quadSize' => '20');

$aElementToAdd['type'] = 'circle';
$aElementToAdd['cx'] = '50';
$aElementToAdd['cy'] = '100';
$aElementToAdd['r'] = '10';
$aElementToAdd['stroke'] = 'black';
$aElementToAdd['stroke-width'] = '1';
$aElementToAdd['fill'] = 'red';

$aElementToAdd2['type'] = 'circle';
$aElementToAdd2['cx'] = '90';
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
$aElementToAdd3['fill'] = 'red';

/* GENERATE OBJECTS */
$obj = Core::getEmptyObj();

if($obj !== false) {
	$obj->setSize("800", "600");
	$obj->setGrid($aGrid);
	$obj->addElement($aElementToAdd);
	$obj->addElement($aElementToAdd2);
	$obj->addElement($aElementToAdd3);
	$mySvg = $obj->getSVG();
	
	echo $mySvg;
} else {
	echo 'there was an error creating empty svg object';
}