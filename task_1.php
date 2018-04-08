<?php

function searchCategory(&$categories, $id)
{
    static $result;
    
    if (array_key_exists('id', $categories)) {

        if ($categories['id'] == intval($id)) 
            return $categories['title'];

        if (array_key_exists('children', $categories)) 
            $result = searchCategory($categories['children'], $id);
        
    } else {        
        foreach ($categories as $value) 
            $result = searchCategory($value, $id);
    }
    return ($result) ? $result : "Категория не найдена";
}
   
$categories = array(
    array(
        'id' => 1,
        'title' => 'Обувь',
        'children' => array(
            array(
                'id' => 2,
                'title' => 'Ботинки',
                'children' => array(
                    array('id' => 3, 'title' => 'Кожа'),
                    array('id' => 4, 'title' => 'Текстиль'),
                ),
            ),
            array('id' => 5, 'title' => 'Кроссовки'),
        )
    ),
    array(
        'id' => 6,
        'title' => 'Спорт',
        'children' => array(
            array(
                'id' => 7,
                'title' => 'Мячи'
            )
        )
    ),
);

echo searchCategory($categories, 9);
echo searchCategory($categories, 6);
echo searchCategory($categories, 7);
