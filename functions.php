<?php

function debug($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die;
}