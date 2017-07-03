<?php

class PingPonginator
{
    public $input;
    public $output;

    function __construct($input)
    {
        $this->input = $input;
        $this->output;
    }

    function makePongHappen()
    {
        $output_pong = array();
        for ($x = 1; $x <= $this->input; ++$x) {
            if ($x % 15 == 0 && $x > 15) {
                array_push($output_pong, "Ping-Pong");
            } elseif ($x % 5 == 0) {
                array_push($output_pong, "Pong");
            } elseif ($x % 3 == 0) {
                array_push($output_pong, "Ping");
            } else {
                array_push($output_pong, $x);
            }
        }
         $this->output = $output_pong;
    }
    function printOutput()
    {
        return $this->output;
    }
    function save()
    {
        array_push($_SESSION['ping_pong'], $this);
    }
    static function getAll()
    {
        return $_SESSION['ping_pong'];
    }
}

?>
