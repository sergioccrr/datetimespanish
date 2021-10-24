## DateTimeSpanish

A simple extension of the native [DateTime](https://www.php.net/manual/en/class.datetime.php) class that allows to represent months and days of the week in Spanish.


### Motivation

You can achieve this with the `setlocale` function, but it relies on you having the locale installed on your system, plus to being an ugly global setting.


### Example

```php
<?php

echo (new DateTimeSpanish)->setDate(2020, 1, 6)->format('l, d F Y');
// Return "Lunes, 06 Enero 2020"

// Instead of:

echo (new DateTime)->setDate(2020, 1, 6)->format('l, d F Y');
// Return "Monday, 06 January 2020"
```
