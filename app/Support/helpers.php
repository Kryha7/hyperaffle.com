<?php

    function get_name($raffle_id)
    {
        $raffle = \App\Raffle::where('id', $raffle_id)->first();

        return $raffle->brand." ".$raffle->title;
    }
