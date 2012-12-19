<?php

class Line {

    public function setup() {

        return $this;
    }

    public function render() {

        return simplexml_load_string('<line x1="0" y1="0" x2="200" y2="200" style="stroke:rgb(255,0,0);stroke-width:2"/>');
    }

}