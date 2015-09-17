<?php
header('Content-Type: text/plain');
$i = 1;
$testcases = (int) fgets(STDIN);
while($i <= $testcases) {
    $str = trim(fgets(STDIN));
    $strlen = strlen($str);
    if($strlen > 10) {
        $str = str_split($str);
        print $str[0].($strlen-2).$str[$strlen-1].'\n';
    }else{
        print $str.'\n';
    }
}
