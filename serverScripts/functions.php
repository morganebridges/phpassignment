<?php

/* 
 * A file that will contain common PHP functions to be used across out pages
 */


function escapeString($input){
    return "'" . $input . "'";
}

function createDirIfNeeded($relativePath){
    if (!file_exists($relativePath)) {
    mkdir($relativePath, 0777, true);
}
}
