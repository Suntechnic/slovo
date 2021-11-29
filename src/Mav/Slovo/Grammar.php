<?php

namespace Mav\Slovo;

class Grammar {
    
    /**
     * Возвращает грамотически верное существительное
     *
     * @param int $number - число
     * @param array $titles - массив ['цифра', 'цифры', 'цифр']
     * @param bool $full - вернуть полное представление, включаеющее самое число
     *
     * @return string
    */
    public static function inclineNum (
            int $number,
            array $titles,
            bool $full=false
        ): string
    {  
        $cases = array (2, 0, 1, 1, 1, 2);
        $result = $titles[ ($number%100 > 4 && $number%100 < 20) ? 2 : $cases[min($number%10, 5)] ];
        return $full?$number.' '.$result:$result;  
    }
    
}