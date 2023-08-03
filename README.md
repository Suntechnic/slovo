Описание
========

Набор классов для работы со словами, включающий русскую версию metaphone - metaphour.

### Grammar

Класс статических функкций русской грамматики

Установка
=========

composer require mav/slovo

Использование
=============

```php
\Mav\Slovo\Grammar::inclineNum($x,['цифра','цифры','цифр']);
```


### Алгоритм Metaphour

Даный алгоритм является аналогом metaphone для русского языка и основан на алгоритме предложенном Петром Коньковски (http://forum.aeroion.ru/topic461.html), включающем доработку Никиты Сметанина (трансляция ТС/ДС в Ц: https://habr.com/ru/post/114947/) в версии 2 (по умолчанию).

Использование
=============

```php
$phonetics = new \Mav\Slovo\Phonetics();
$phonetics->metaphour('Насанов');  // НАСАНАФ
$phonetics->metaphour('Нассонов'); // НАСАНАФ
$phonetics->metaphour('Насонов');  // НАСАНАФ
```

### Транслитерация

Использование
=============

```php
$transliterator = new \Mav\Slovo\Transliterator();
$transliterator->trans('слово'); // slovo
```