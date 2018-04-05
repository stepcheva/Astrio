<?php

function isCorrect($array)
{
    $stack = new SplStack();
    $allowed = ['<hr>', '<img>', '<input>'];

    foreach ($array as $value) {
        //Проверяем, относится ли тег к парным тегам
        if (in_array($value, $allowed)) {
            continue;
        } else {
            //признак закрывающегося тега
            $flag = strpos($value, '/');
            if (!$flag) {
                //заносим открывающийся тег в стек
                $stack->push($value);
            } else {
                //закрывающийся тег соответствует вершине стека - удаляем вершину стека
                if (!$stack->isEmpty() && str_replace('/', '', $value) == $stack->top()) {
                    $stack->pop();
                } else {
                    return 'Некорректная структура HTML';
                }
            }
        }
    }
    return $stack->isEmpty() ? 'Корректная структура HTML' : 'Некорректная структура HTML';
}

$arrayTrue = ['<a>', '<div>', '<img>', '</div>', '</a>', '<span>', '</span>'];
$arrayFalse = ['<a>', '<div>', '</a>'];

echo isCorrect($arrayTrue) . '<br/>';
echo isCorrect($arrayFalse) . '<br/>';