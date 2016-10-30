<?php
/**
 * Возвращение значений из ф-и по ссылке
 * Форматирование текста:
 * 1) strtolower
 * 2) ucfirst
 */
function fix_name(&$n1, &$n2, &$n3)
{
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
    return $n1. ' '. $n2. ' '. $n3.' ';
}
