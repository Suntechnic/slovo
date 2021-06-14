<?php

namespace Mav\Slovo\Phonetics;

class Metaphour {
    
    // упрощение гласных
    //private $vowelsSimplingTable = [
    //            'ЙО' => 'И', 'ИО' => 'И', 'ЙЕ' => 'И', 'ИЕ' => 'И',
    //            'О' => 'А', 'Ы' => 'А', 'Я' => 'А',
    //            'Е' => 'И', 'Ё' => 'И', 'Э' => 'И',
    //            'Ю' => 'У'
    //        ];
        
    // оглушение
    private $flumpingTable = [
                'Б' => 'П',
                'З' => 'С',
                'Д' => 'Т',
                'В' => 'Ф',
                'Г' => 'К',
            ];
        
    // таблица сжатия окончаний
    private $endingsCompressionTable = [
                'ОВСКИЙ_' => '@',
                'ЕВСКИЙ_' => '#',
                'ИВСКИЙ_' => '#',
                'ОВСКАЯ_' => '$',
                'ЕВСКАЯ_' => '%',
                'ИВСКАЯ_' => '%',
                'ИЕВА_' => '9',
                'ЕЕВА_' => '9',
                'ОВА_' => '9',
                'ЕВА_' => '9',
                'ИНА_' => '1',
                'ИЕВ_' => '4',
                'ЕЕВ_' => '4',
                'НКО_' => '3',
                'ОВ_' => '4',
                'ЕВ_' => '4',
                'АЯ_' => '6',
                'ИЙ_' => '7',
                'ЫЙ_' => '7',
                'ЫХ_' => '5',
                'ИХ_' => '5',
                'ИН_' => '8',
                'ИК_' => '2',
                'ЕК_' => '2',
                'УК_' => '0',
                'ЮК_' => '0',
                '_' => ''
            ];
    
    
    private function prepare (
            string $slovo
        )
    {
        // удаляем из слова все кроме русских букв, образующих звуки
        $SLOVO = preg_replace('/[^ОЕАИУЭЮЯПСТРКЛМНБВГДЖЗЙФХЦЧШЩЫЁ]/u','',\mb_strtoupper($slovo));
        
        // удаляем повторяющиеся символы
        $SLOVO = preg_replace('/(.)\\1+/u','$1',$SLOVO);
        
        return $SLOVO;
    }
    
    // сжтатие окончаний
    private $endingCompressionReplacer = false;
    private function endingCompression (string $SLOVO) {
        if (!$this->endingCompressionReplacer) {
            $this->endingCompressionReplacer = new \Mav\Slovo\Utils\Replacer($this->endingsCompressionTable);
        }
        return $this->endingCompressionReplacer->replace($SLOVO.'_');
    }
    
    // упрощение гласных
    //private $vowelsSimplingReplacer = false;
    //private function vowelsSimpling (string $SLOVO) {
    //    if (!$this->vowelsSimplingReplacer) {
    //        $this->vowelsSimplingReplacer = new \Mav\Slovo\Utils\Replacer($this->vowelsSimplingTable);
    //    }
    //    
    //    return $this->vowelsSimplingReplacer->replace($SLOVO);
    //}
    private function vowelsSimpling (string $SLOVO) { // +20% производительности
        return preg_replace('/Ю/u', 'У', preg_replace('/Е|Ё|Э/u', 'И', preg_replace('/О|Ы|Я/u', 'А', preg_replace('/ЙО|ИО|ЙЕ|ИЕ/u', 'И', $SLOVO))));
    }
    
    // оглушение согласных
    private $flumpingRegexps = false;
    private function flumping ($SLOVO) {
        if (!$this->flumpingRegexps) {
            $this->flumpingRegexps = [];
            foreach($this->flumpingTable as $search => $replace) {
                $this->flumpingRegexps["/{$search}([ПСТКБВГДЖЗФХЦЧШЩ])|{$search}()$/u"] = "{$replace}$1";
            }
        }
        
        foreach($this->flumpingRegexps as $search => $replace) {
            $SLOVO = preg_replace($search, $replace, $SLOVO);
        }
        return $SLOVO;
    }
    
    /**
     * Implementation metaphone for russian language
     *
     * @param string $slovo
     * @param int $versiond=2
     * @param bool $ending_compression=false
     *
     * @return string
    */
    public function encode (
            string $slovo,
            int $version=2,
            bool $ending_compression=false
        )
    {
        
        $SLOVO = $this->prepare($slovo);
        
        // сжатие окончаний
        if ($ending_compression) {
            $SLOV = $this->endingCompression($SLOVO);
        } else {
            $SLOV = $SLOVO;
        }
        
        // упрощение гласных
        $SLV = $this->vowelsSimpling($SLOV);
        
        // оглушение согласных
        $SLF = $this->flumping($SLV);
        
        // ТС и ДС => Ц
        if ($version > 1) {
            $SLF = str_replace('ТС','Ц',$SLF);
        }
        
        return $SLF;
    }
}