<?php

function convertirMinute(int $minute): string {
    $heure = floor($minute / 60);
    $reste = $minute % 60;

    return " ".$heure."h ".$reste."min";


} 






?>