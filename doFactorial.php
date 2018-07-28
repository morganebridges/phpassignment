<?php

main();
function main(){
    $result = doFactorial(5);
}


function doFactorial($x){
    echo "x = " + $x;
    if($x === 1){
        return $x * ($x + 1);
    }else{
        echo "returning ". $x ."times ".$x-1;   
        return $x * doFactorial($x - 1);
    }
}

