<?php

namespace Mav\Slovo\Utils;

class Replacer {
    
    private $From;
    private $To;
    
    /**
    * Replacer constructor
    *
    * @param array $refTable
    *
    */
    public function __construct (array $refTable = [])
    {
        $this->From = array_keys($refTable);
        $this->To = array_values($refTable);
    }
    
    /**
    * Добавляет правило в таблицу замен
    *
    * @param string $from
    * @param string $to=''
    *
    * @return \Mav\Slovo\Utils\Replacer
    */
    public function append (string $from, string $to='') {
        array_push($this->From,$from);
        array_push($this->To,$from);
        
        return $this;
    }
    
    
    
    /**
    * Выполняет замены по текущей таблице
    *
    * @param string $slovo
    *
    * @return string
    */
    public function replace ($slovo) {
        return str_replace($this->From,$this->To,$slovo);
    }
    
}