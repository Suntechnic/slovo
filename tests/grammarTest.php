<?php

/**
 * Class GrammarTest
 */
class GrammarTest extends \PHPUnit\Framework\TestCase
{
    
    private $metaphour;
    
    public function __construct ()
    {
        $this->grammar = new \Mav\Slovo\Grammar();
        return parent::__construct();
    }
    
    // тестирование изменения слова по числам
    public function testInclineNum(): void
    {
        $lstTests = [
                [
                        'expected' => '1 цифра',
                        'args' => [
                                'number' => 1,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => true
                            ]
                    ],
                [
                        'expected' => 'цифра',
                        'args' => [
                                'number' => 1,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифра',
                        'args' => [
                                'number' => 1021,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифры',
                        'args' => [
                                'number' => 1022,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифры',
                        'args' => [
                                'number' => 503,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифры',
                        'args' => [
                                'number' => 204,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 105,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 1117,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 7,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 8,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 18,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 9,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 99,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 10,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 11,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 112,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ],
                [
                        'expected' => 'цифр',
                        'args' => [
                                'number' => 9613,
                                'titles' => ['цифра', 'цифры', 'цифр'],
                                'full' => false
                            ]
                    ]
                
            ];
        foreach ($lstTests as $dctTest) $this->assertSame(
                $dctTest['expected'],
                $this->grammar->inclineNum(
                        $dctTest['args']['number'],
                        $dctTest['args']['titles'],
                        $dctTest['args']['full']
                    )
            );
    }
}