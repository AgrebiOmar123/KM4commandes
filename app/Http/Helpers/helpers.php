<?php

function format_argent ($nombre) {
    return number_format($nombre, 0, ',', '.');
}