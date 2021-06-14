<?php

namespace Mav\Slovo;

class Transliterator {

    const TABLE = [
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'yo',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ъ' => '',
            'ы' => 'y',
            'ь' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya'
        ];
    
    const TABLEXT = [
            'á' => 'a',
            'ă' => 'a',
            'ắ' => 'a',
            'ặ' => 'a',
            'ằ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'ǎ' => 'a',
            'â' => 'a',
            'ấ' => 'a',
            'ậ' => 'a',
            'ầ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ä' => 'a',
            'ǟ' => 'a',
            'ȧ' => 'a',
            'ǡ' => 'a',
            'ạ' => 'a',
            'ȁ' => 'a',
            'à' => 'a',
            'ả' => 'a',
            'ȃ' => 'a',
            'ā' => 'a',
            'ą' => 'a',
            'ᶏ' => 'a',
            'ẚ' => 'a',
            'å' => 'a',
            'ǻ' => 'a',
            'ḁ' => 'a',
            'ⱥ' => 'a',
            'ã' => 'a',
            'ɐ' => 'a',
            'ₐ' => 'a',
            'ḃ' => 'b',
            'ḅ' => 'b',
            'ɓ' => 'b',
            'ḇ' => 'b',
            'ᵬ' => 'b',
            'ᶀ' => 'b',
            'ƀ' => 'b',
            'ƃ' => 'b',
            'ć' => 'c',
            'č' => 'c',
            'ç' => 'c',
            'ḉ' => 'c',
            'ĉ' => 'c',
            'ɕ' => 'c',
            'ċ' => 'c',
            'ƈ' => 'c',
            'ȼ' => 'c',
            'ↄ' => 'c',
            'ꜿ' => 'c',
            'ď' => 'd',
            'ḑ' => 'd',
            'ḓ' => 'd',
            'ȡ' => 'd',
            'ḋ' => 'd',
            'ḍ' => 'd',
            'ɗ' => 'd',
            'ᶑ' => 'd',
            'ḏ' => 'd',
            'ᵭ' => 'd',
            'ᶁ' => 'd',
            'đ' => 'd',
            'ɖ' => 'd',
            'ƌ' => 'd',
            'ꝺ' => 'd',
            'é' => 'e',
            'ĕ' => 'e',
            'ě' => 'e',
            'ȩ' => 'e',
            'ḝ' => 'e',
            'ê' => 'e',
            'ế' => 'e',
            'ệ' => 'e',
            'ề' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ḙ' => 'e',
            'ë' => 'e',
            'ė' => 'e',
            'ẹ' => 'e',
            'ȅ' => 'e',
            'è' => 'e',
            'ẻ' => 'e',
            'ȇ' => 'e',
            'ē' => 'e',
            'ḗ' => 'e',
            'ḕ' => 'e',
            'ⱸ' => 'e',
            'ę' => 'e',
            'ᶒ' => 'e',
            'ɇ' => 'e',
            'ẽ' => 'e',
            'ḛ' => 'e',
            'ɛ' => 'e',
            'ᶓ' => 'e',
            'ɘ' => 'e',
            'ǝ' => 'e',
            'ₑ' => 'e',
            'ḟ' => 'f',
            'ƒ' => 'f',
            'ᵮ' => 'f',
            'ᶂ' => 'f',
            'ꝼ' => 'f',
            'ǵ' => 'g',
            'ğ' => 'g',
            'ǧ' => 'g',
            'ģ' => 'g',
            'ĝ' => 'g',
            'ġ' => 'g',
            'ɠ' => 'g',
            'ḡ' => 'g',
            'ᶃ' => 'g',
            'ǥ' => 'g',
            'ᵹ' => 'g',
            'ɡ' => 'g',
            'ᵷ' => 'g',
            'ḫ' => 'h',
            'ȟ' => 'h',
            'ḩ' => 'h',
            'ĥ' => 'h',
            'ⱨ' => 'h',
            'ḧ' => 'h',
            'ḣ' => 'h',
            'ḥ' => 'h',
            'ɦ' => 'h',
            'ẖ' => 'h',
            'ħ' => 'h',
            'ɥ' => 'h',
            'ʮ' => 'h',
            'ʯ' => 'h',
            'í' => 'i',
            'ĭ' => 'i',
            'ǐ' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ḯ' => 'i',
            'ị' => 'i',
            'ȉ' => 'i',
            'ì' => 'i',
            'ỉ' => 'i',
            'ȋ' => 'i',
            'ī' => 'i',
            'į' => 'i',
            'ᶖ' => 'i',
            'ɨ' => 'i',
            'ĩ' => 'i',
            'ḭ' => 'i',
            'ı' => 'i',
            'ᴉ' => 'i',
            'ᵢ' => 'i',
            'ǰ' => 'j',
            'ĵ' => 'j',
            'ʝ' => 'j',
            'ɉ' => 'j',
            'ȷ' => 'j',
            'ɟ' => 'j',
            'ʄ' => 'j',
            'ⱼ' => 'j',
            'ḱ' => 'k',
            'ǩ' => 'k',
            'ķ' => 'k',
            'ⱪ' => 'k',
            'ꝃ' => 'k',
            'ḳ' => 'k',
            'ƙ' => 'k',
            'ḵ' => 'k',
            'ᶄ' => 'k',
            'ꝁ' => 'k',
            'ꝅ' => 'k',
            'ʞ' => 'k',
            'ĺ' => 'l',
            'ƚ' => 'l',
            'ɬ' => 'l',
            'ľ' => 'l',
            'ļ' => 'l',
            'ḽ' => 'l',
            'ȴ' => 'l',
            'ḷ' => 'l',
            'ḹ' => 'l',
            'ⱡ' => 'l',
            'ꝉ' => 'l',
            'ḻ' => 'l',
            'ŀ' => 'l',
            'ɫ' => 'l',
            'ᶅ' => 'l',
            'ɭ' => 'l',
            'ł' => 'l',
            'ꞁ' => 'l',
            'ḿ' => 'm',
            'ṁ' => 'm',
            'ṃ' => 'm',
            'ɱ' => 'm',
            'ᵯ' => 'm',
            'ᶆ' => 'm',
            'ɯ' => 'm',
            'ɰ' => 'm',
            'ń' => 'n',
            'ň' => 'n',
            'ņ' => 'n',
            'ṋ' => 'n',
            'ȵ' => 'n',
            'ṅ' => 'n',
            'ṇ' => 'n',
            'ǹ' => 'n',
            'ɲ' => 'n',
            'ṉ' => 'n',
            'ƞ' => 'n',
            'ᵰ' => 'n',
            'ᶇ' => 'n',
            'ɳ' => 'n',
            'ñ' => 'n',
            'ó' => 'o',
            'ŏ' => 'o',
            'ǒ' => 'o',
            'ô' => 'o',
            'ố' => 'o',
            'ộ' => 'o',
            'ồ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ö' => 'o',
            'ȫ' => 'o',
            'ȯ' => 'o',
            'ȱ' => 'o',
            'ọ' => 'o',
            'ő' => 'o',
            'ȍ' => 'o',
            'ò' => 'o',
            'ỏ' => 'o',
            'ơ' => 'o',
            'ớ' => 'o',
            'ợ' => 'o',
            'ờ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ȏ' => 'o',
            'ꝋ' => 'o',
            'ꝍ' => 'o',
            'ⱺ' => 'o',
            'ō' => 'o',
            'ṓ' => 'o',
            'ṑ' => 'o',
            'ǫ' => 'o',
            'ǭ' => 'o',
            'ø' => 'o',
            'ǿ' => 'o',
            'õ' => 'o',
            'ṍ' => 'o',
            'ṏ' => 'o',
            'ȭ' => 'o',
            'ɵ' => 'o',
            'ɔ' => 'o',
            'ᶗ' => 'o',
            'ᴑ' => 'o',
            'ᴓ' => 'o',
            'ₒ' => 'o',
            'ṕ' => 'p',
            'ṗ' => 'p',
            'ꝓ' => 'p',
            'ƥ' => 'p',
            'ᵱ' => 'p',
            'ᶈ' => 'p',
            'ꝕ' => 'p',
            'ᵽ' => 'p',
            'ꝑ' => 'p',
            'ʠ' => 'q',
            'ɋ' => 'q',
            'ꝙ' => 'q',
            'ꝗ' => 'q',
            'ŕ' => 'r',
            'ř' => 'r',
            'ŗ' => 'r',
            'ṙ' => 'r',
            'ṛ' => 'r',
            'ṝ' => 'r',
            'ȑ' => 'r',
            'ɾ' => 'r',
            'ᵳ' => 'r',
            'ȓ' => 'r',
            'ṟ' => 'r',
            'ɼ' => 'r',
            'ᵲ' => 'r',
            'ᶉ' => 'r',
            'ɍ' => 'r',
            'ɽ' => 'r',
            'ꞃ' => 'r',
            'ɿ' => 'r',
            'ɹ' => 'r',
            'ɻ' => 'r',
            'ɺ' => 'r',
            'ⱹ' => 'r',
            'ᵣ' => 'r',
            'ś' => 's',
            'ṥ' => 's',
            'š' => 's',
            'ṧ' => 's',
            'ş' => 's',
            'ŝ' => 's',
            'ș' => 's',
            'ṡ' => 's',
            'ṣ' => 's',
            'ṩ' => 's',
            'ʂ' => 's',
            'ᵴ' => 's',
            'ᶊ' => 's',
            'ȿ' => 's',
            'ꞅ' => 's',
            'ſ' => 's',
            'ẜ' => 's',
            'ẛ' => 's',
            'ẝ' => 's',
            'ť' => 't',
            'ţ' => 't',
            'ṱ' => 't',
            'ț' => 't',
            'ȶ' => 't',
            'ẗ' => 't',
            'ⱦ' => 't',
            'ṫ' => 't',
            'ṭ' => 't',
            'ƭ' => 't',
            'ṯ' => 't',
            'ᵵ' => 't',
            'ƫ' => 't',
            'ʈ' => 't',
            'ŧ' => 't',
            'ꞇ' => 't',
            'ʇ' => 't',
            'ú' => 'u',
            'ŭ' => 'u',
            'ǔ' => 'u',
            'û' => 'u',
            'ṷ' => 'u',
            'ü' => 'u',
            'ǘ' => 'u',
            'ǚ' => 'u',
            'ǜ' => 'u',
            'ǖ' => 'u',
            'ṳ' => 'u',
            'ụ' => 'u',
            'ű' => 'u',
            'ȕ' => 'u',
            'ù' => 'u',
            'ᴝ' => 'u',
            'ủ' => 'u',
            'ư' => 'u',
            'ứ' => 'u',
            'ự' => 'u',
            'ừ' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ȗ' => 'u',
            'ū' => 'u',
            'ṻ' => 'u',
            'ų' => 'u',
            'ᶙ' => 'u',
            'ů' => 'u',
            'ũ' => 'u',
            'ṹ' => 'u',
            'ṵ' => 'u',
            'ᵤ' => 'u',
            'ṿ' => 'u',
            'ⱴ' => 'u',
            'ꝟ' => 'u',
            'ʋ' => 'u',
            'ᶌ' => 'v',
            'ⱱ' => 'v',
            'ṽ' => 'v',
            'ʌ' => 'v',
            'ᵥ' => 'v',
            'ẃ' => 'w',
            'ŵ' => 'w',
            'ẅ' => 'w',
            'ẇ' => 'w',
            'ẉ' => 'w',
            'ẁ' => 'w',
            'ⱳ' => 'w',
            'ẘ' => 'w',
            'ʍ' => 'w',
            'ẍ' => 'x',
            'ẋ' => 'x',
            'ᶍ' => 'x',
            'ₓ' => 'x',
            'ý' => 'y',
            'ŷ' => 'y',
            'ÿ' => 'y',
            'ẏ' => 'y',
            'ỵ' => 'y',
            'ỳ' => 'y',
            'ƴ' => 'y',
            'ỷ' => 'y',
            'ỿ' => 'y',
            'ȳ' => 'y',
            'ẙ' => 'y',
            'ɏ' => 'y',
            'ỹ' => 'y',
            'ʎ' => 'y',
            'ź' => 'z',
            'ž' => 'z',
            'ẑ' => 'z',
            'ʑ' => 'z',
            'ⱬ' => 'z',
            'ż' => 'z',
            'ẓ' => 'z',
            'ȥ' => 'z',
            'ẕ' => 'z',
            'ᵶ' => 'z',
            'ᶎ' => 'z',
            'ʐ' => 'z',
            'ƶ' => 'z',
            'ɀ' => 'z',
            'ß' => 'ss'
        ];
    
    
    /**
    * Transliteration constructor.
    *
    * @param array|bool $refTable
    *
    */
    public function __construct ($refTable=false)
    {
        $this->setTable($refTable);
    }
    
    /**
     * Return mathes table
     *
     * @return array
    */
    public function getTable ()
    {
        return array_combine($this->from, $this->to);
    }
    
    /**
     * Set custom mathes table
     *
     * @param array|bool $refTable
     *
     * @return Mav\Slovo\Transliterator
    */
    public function setTable ($refTable=false)
    {
        if (!$refTable) {
            $refTable = self::TABLE;
        } elseif (is_array($refTable)) {
            //$refTable = $refTable;
        } else {
            $refTable = array_merge(self::TABLE,self::TABLEXT);
        }
        
        $this->from = array_keys($refTable);
        $this->to = array_values($refTable);
        
        return $this;
    }
    
    /**
     * append custom mathes table to current table
     *
     * @param array $refTable
     *
     * @return Mav\Slovo\Transliterator
    */
    public function appendTable (array $refTable)
    {
        $this->from = array_merge($this->from,array_keys($refTable));
        $this->to   = array_merge($this->to,array_values($refTable));
        
        return $this;
    }
    
    /**
     * Return mathes table
     *
     * @param string $slovo
     * 
     * @return string
    */
    public function trans (string $slovo)
    {
        $slovo = strtolower($slovo);
        return str_replace($this->from, $this->to, $slovo);
    }
}