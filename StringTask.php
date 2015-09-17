<?php
class stringtast{
    private $_result = '';
    private $_str2;
    private $_strlen;
    private $_vowel;
    public function stringTask($str) {
        if(!empty($str)) {
            $str =  str_replace(' ', '', $str);
            $this->_strlen = strlen($str);
            $this->_vowel = array('A', 'O', 'Y', 'E', 'U', 'I');
            if($this->_strlen > 0 && $this->_strlen <= 100) {
                $this->_str2 = str_split($str);
                for($i = 0; $i < $this->_strlen; $i++) {
                    if(!in_array(strtoupper($this->_str2[$i]), $this->_vowel)) {
                        $this->_result.= '.'.$this->_str2[$i];
                    }

                }
                return strtolower($this->_result);
            }
        }
        return false;
    }
}

$obj = new stringtast();
print $obj->stringTask(trim(fgets(STDIN)));
