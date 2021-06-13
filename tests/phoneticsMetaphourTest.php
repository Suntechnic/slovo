<?php

/**
 * Class PhoneticsMetaphourTest
 */
class PhoneticsMetaphourTest extends \PHPUnit\Framework\TestCase
{
    
    private $metaphour;
    
    public function __construct ()
    {
        $this->metaphour = new \Mazha\Slovo\Phonetics\Metaphour();
        return parent::__construct();
    }
    
    // тестирование сжатия окончаний
    public function testEndingCompression(): void
    {
        $refExpected = [
                'ВИТАВСКИЙ' => 'ВИТ@',
                'ВИТОВСКИЙ' => 'ВИТ@',
            ];
        
        foreach ($refExpected as $test=>$expected) $this->assertSame(
                $expected,
                $this->metaphour->endingCompression($test)
            );
    }
    
    // тестирование упрощения гласных
    public function testVowelsSimpling(): void
    {
        $refExpected = [
                // ЙО, ИО, ЙЕ, ИЕ → И
                'ФИОЛА' => 'ФИЛА',
                'ПЕНИЕ' => 'ПИНИ',
                'ЙОД' => 'ИД',
                // О, Ы, Я → А
                'МОЛОКО' => 'МАЛАКА',
                'БЫКОВ' => 'БАКАВ',
                'ПАЯЛЬНИК' => 'ПААЛЬНИК',
                // Е, Ё, Э → И
                'ЁЖИК' => 'ИЖИК',
                // Ю → У
                'ЮЛА' => 'УЛА'
            ];
        
        foreach ($refExpected as $test=>$expected) $this->assertSame(
                $expected,
                $this->metaphour->vowelsSimpling($test)
            );
    }
    
    // оглушение
    public function testFlumping(): void
    {
        $refExpected = [
                // Б → П
                'БАОБАБ' => 'БАОБАП',
                'ОБКАТКА' => 'ОПКАТКА',
                // З → С
                'АЗБЕСТ' => 'АСБЕСТ',
                // Д → Т
                'ВОДОПАД' => 'ВОДОПАТ',
                // В → Ф
                'ТАБАКОВ' => 'ТАБАКОФ',
                
                // Г → К
                
                // общие тесты
                'СОВБЕЗ' => 'СОФБЕС',
                'КУЗНЕЦОВ' => 'КУЗНЕЦОФ',
            ];
        foreach ($refExpected as $test=>$expected) $this->assertSame(
                $expected,
                $this->metaphour->flumping($test)
            );
    }
    
    
    // тестирование первой версии
    public function testEncodeV1(): void
    {
        $refExpected = [
                'ВИТАФСКИЙ' => ['Витавский', 'Витовский'],
                'ВИТИНБИРК' => ['Витенберг', 'Виттенберг'],
                'НАСАНАФ' => ['Насанов', 'Насонов', 'Нассонов', 'Носонов'],
                'ПИРМАКАФ' => ['Пермаков', 'Пермяков', 'Перьмяков'],
                'ШВАРТСИНИГИР' => ['Швардсенеггер'],
                'ШВАРЦИНИГИР' => ['Шварценеггер', 'Шворцинегир'],
            ];
        foreach ($refExpected as $expected=>$lstTest) foreach ($lstTest as $test) $this->assertSame(
                $expected,
                $this->metaphour->encode($test,1)
            );
    }
    
    // тестирование второй версии
    public function testEncodeV2(): void
    {
        $refExpected = [
                'ВИТАФСКИЙ' => ['Витавский', 'Витовский'],
                'ВИТИНБИРК' => ['Витенберг', 'Виттенберг'],
                'НАСАНАФ' => ['Насанов', 'Насонов', 'Нассонов', 'Носонов'],
                'ПИРМАКАФ' => ['Пермаков', 'Пермяков', 'Перьмяков'],
                'ШВАРЦИНИГИР' => ['Швардсенеггер','Шварценеггер', 'Шворцинегир']
            ];
        foreach ($refExpected as $expected=>$lstTest) foreach ($lstTest as $test) $this->assertSame(
                $expected,
                $this->metaphour->encode($test)
            );
    }
    
    // тестирование версии против чужих
    public function testVsXeno(): void
    {
        $lstSurnames = file(__DIR__.'/../data/surnames_balanovska.txt');
        
        foreach ($lstSurnames as $test) $this->assertSame(
                mb_strtoupper(self::xenoMetaphour($test)),
                $this->metaphour->encode($test),
                $test
            );
    }
    
    // тестирование версии против чужих
    public function testVsXenoWithEndingCompress(): void
    {
        $lstSurnames = file(__DIR__.'/../data/surnames_zhuravlev.txt');
        
        foreach ($lstSurnames as $test) $this->assertSame(
                mb_strtoupper(self::xenoMetaphour($test,true)),
                $this->metaphour->encode($test,2,true),
                $test
            );
    }
    
    //
    private static function xenoMetaphour($word, $surname = false): string
    {
        //github.com/rossvs/Metaphone_Rus/blob/master/metaphone_rus.php
        mb_internal_encoding('UTF-8');
        $word = mb_strtolower($word);
        $word = preg_replace('/[^оеаиуэюяпстрклмнбвгджзйфхцчшщыё]/u', '', $word);
        
        //Исключение повторяющихся символов
        $word = preg_replace('/(.)\\1+/u', '$1', $word);
            
        //Сжатие окончаний
        if($surname) 
        {		
            $endings = array(
                'овский' => '@',
                'евский' => '#',
                'овская' => '$',
                'евская' => '%',
                'иева' => '9',
                'еева' => '9',
                'ова' => '9',
                'ева' => '9',
                'ина' => '1',
                'иев' => '4',
                'еев' => '4',
                'нко' => '3',
                'ов' => '4',
                'ев' => '4',
                'ая' => '6',
                'ий' => '7',
                'ый' => '7',
                'ых' => '5',
                'их' => '5',
                'ин' => '8',
                'ик' => '2',
                'ек' => '2',
                'ук' => '0',
                'юк' => '0'
            );
        }
        else
        {
            $endings = [];
        }
        
        foreach($endings as $match => $replacement)
        {
            $count = 0;
            $word = preg_replace('/' . $match . '$/u', $replacement, $word, 1, $count);
            if($count > 0) break;
        }
        
        //Замена гласных
        ///////////////////////////////////////////////////////
        // хотфикс для https://github.com/rossvs/Metaphone_Rus/issues/1
        $vowelsReplacement = array(
            'и' => array('йо', 'ио', 'йе', 'ие')	
        );
        foreach($vowelsReplacement as $replacement => $search)
        {
            $word = str_replace($search, $replacement, $word);
        }
        //////////////////////////////////////////////////////
        $vowelsReplacement = array(
            'а' => array('о', 'ы', 'я'),
            'и' => array('е', 'ё', 'э'),
            'у' => array('ю')		
        );
        foreach($vowelsReplacement as $replacement => $search)
        {
            $word = str_replace($search, $replacement, $word);
        }
        $word = preg_replace('/(.)\\1+/u', '$1', $word);
        
        //Оглушение согласных в слабой позиции (перед не сонорными согласными и на конце слов)
        $dullReplacement = array(
            'б' => 'п',
            'з' => 'с',
            'д' => 'т',
            'в' => 'ф',
            'г' => 'к'
        );
        
        foreach($dullReplacement as $search => $replace)
        {
            $word = preg_replace("/{$search}([псткбвгджзфхцчшщ])|{$search}()$/u", "{$replace}$1", $word);
        }
        
        //Исключение повторяющихся символов
        $word = preg_replace('/(.)\\1+/u', '$1', $word);		
    
        
        return $word;
    }
    
}