<?php

function createSlug($str, $delimiter = '-'){

    $unwanted_array = ['š'=>'s', 'ą' => 'a', 'č' => 'c', 'ę' => 'e', 'ž' => 'z', 'ė' =>'e', 'į'=>'i', 'ų'=>'u', 'ū'=>'u',
        'Š'=>'s', 'Ą' => 'a', 'Č' => 'c', 'Ę' => 'e', 'Ž' => 'z', 'Ė' => 'e', 'Į' => 'i', 'Ų' => 'u', 'Ū' => 'u']; 
    $str = strtr( $str, $unwanted_array );

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
}

?>