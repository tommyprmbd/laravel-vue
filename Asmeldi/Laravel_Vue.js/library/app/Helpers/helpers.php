<?php

function DateFormat($value)
{
    return date('H:i:s  d M Y', strtotime($value));
}
