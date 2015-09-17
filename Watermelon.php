<?php
class Watermelon{
    private $_result;
    public function getResult($kilo) {
        if($kilo >= 1 && $kilo <= 100) {
            if($kilo % 2 == 0 && $kilo > 2) {
                return 'YES';
            }else{
                return 'NO';
            }
        }
        return false;
    }
}

$obj = new Watermelon();
print $obj->getResult(fgets(STDIN));
