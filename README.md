Описание
========

Набор классов для работы со словами, включающая русскую версию metaphone - metaphour.

### Алгоритм Metaphour

Даный алгоритм является аналого metaphone для русского языка и основан на алгоритме предложенном Петром Коньковски (http://forum.aeroion.ru/topic461.html), включающем доработку Никиты Сметанина (трансляция ТС/ДС в Ц: https://habr.com/ru/post/114947/) в версии 2 (по умолчанию).

Использование
=============

```php
$phonetics = new \Mazha\Slovo\Phonetics();
$phonetics->metaphour('Насанов');  // НАСАНАФ
$phonetics->metaphour('Нассонов'); // НАСАНАФ
$phonetics->metaphour('Насонов');  // НАСАНАФ
```
