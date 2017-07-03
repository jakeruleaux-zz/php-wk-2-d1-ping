<?php

class PingPonginator
{
    function makePongHappen($input_ping)
    {
        $output_pong = array();
        for ($x = $input_ping; $x > 0; --$x) {
            array_push($output_pong, $x);
        }
        foreach($output_pong as $pong) {
            if ($pong % 3 == 0) {
                $pong = "Ping";
            }
        }
        return $output_pong;
    }
}

?>
