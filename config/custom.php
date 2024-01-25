<?php

return [
    'category_level' => 0,
    'max_sub_level'  => 4,
    'is_development' => config('app.env') === 'local',
    'menu_type'      => ['category', 'subcategory', 'item']
];
