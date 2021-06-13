Описание
========

Набор классов для работы со словами, включающая русскую версию metaphone - metaphour.

Использование
=============

```php
$phonetics = new \Mazha\Slovo\Phonetics();
$phonetics->metaphour('Насанов');  // НАСАНАФ
$phonetics->metaphour('Нассонов'); // НАСАНАФ
$phonetics->metaphour('Насонов');  // НАСАНАФ
```
