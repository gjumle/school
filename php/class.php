<?php

class Ball {
    // Properties
    public $size;
    public $color;
    public $type;

    // Methods
    function set_size($size) {
        $this->size = $size;
    }

    function get_size() {
        return $this->size;
    }

    function set_color($color) {
        $this->color = $color;
    }

    function get_color() {
        return $this->color;
    }

    function set_type($type) {
        $this->type = $type;
    }

    function get_type() {
        return $this->type;
    }
}

$basketball = new Ball();
$voleyball = new Ball();
$basketball->set_size("4");
$voleyball->set_size("3");

echo $basketball->get_size();
echo "<br>";
echo $voleyball->get_size();
