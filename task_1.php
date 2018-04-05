<?php

function searchCategory(&$categories, $id)
{
    foreach ($categories as $value) {
        if ($value['id'] == intval($id)) {
            return $value['title'];
        } else {
            if (is_array($value['children'])) {
                return searchCategory($value['children'], $id);
            }
        }
    }
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

echo searchCategory($categories, 4);

