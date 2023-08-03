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
    public function soundex (string $slovo): string
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
    public function metaphone (string $slovo, int $max_phonemes=0): string
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
        ): string
    {
        if (!$this->metaphour) $this->metaphour = new \Mav\Slovo\Phonetics\Metaphour();
        return $this->metaphour->encode($slovo,$version,$ending_compression);
    }
    
    /**
     * Implementation metaphoneSkeleton for russian language
     *
     * @param string $slovo
     * @param int $versiond=2
     * @param bool $ending_compression=false
     *
     * @return string
    */
    public function metaphourSkeleton (
            string $slovo,
            int $version=2,
            bool $ending_compression=false
        )
    {
        $slovo = $this->metaphour($slovo,$version,$ending_compression);
        $slovo = str_replace(['А','И','У'],'',$slovo);
        return $slovo;
    }
}