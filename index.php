<?php
/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');

/* FILL DATA */
$aGrid['x'] = array('lineSize' => '1', 'quadSize' => '20');
$aGrid['y'] = array('lineSize' => '1', 'quadSize' => '20');

$grid = new Grid();
$grid->setSizeField('800', '600')->setGridObject($aGrid);

$line1 = Core::buildObject('Line');
$line2 = Core::buildObject('Line');
$line2->setOptions(array('x1' => 0, 'x2' => 400, 'y1' => 0, 'y2' => 440));

$grid->addElements(array($line1, $line2));
$grid->render();