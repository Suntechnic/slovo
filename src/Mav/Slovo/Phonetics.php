<?php

namespace Mav\Slovo;

class Phonetics {
    
    
    /**
     * Soundex wrapper
     *
     * @param string $slovo
     *
     * @return string
    */
    public function soundex (string $slovo)
    {
        return \soundex($slovo);
    }
    
    /**
     * Metaphone wrapper
     *
     * @param string $slovo
     * @param int $max_phonemes
     *
     * @return string
    */
    public function metaphone (string $slovo, int $max_phonemes=0)
    {
        return \metaphone($slovo, $max_phonemes);
    }
    
    private $metaphour=false;
    /**
     * Implementation metaphone for russian language
     *
     * @param string $slovo
     * @param int $versiond=2
     * @param bool $ending_compression=false
     *
     * @return string
    */
    public function metaphour (
            string $slovo,
            int $version=2,
            bool $ending_compression=false
        )
    {
        if (!$this->metaphour) $this->metaphour = new \Mav\Slovo\Phonetics\Metaphour();
        return $this->metaphour->encode($slovo,$version,$ending_compression);
    }
}