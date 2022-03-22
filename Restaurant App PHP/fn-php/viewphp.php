<?php

//Import "fn-php/php.php"
include_once "fn-php/php.php";

/**
* Function that print ViewMenu into HTML
* @param $categories - Array for save all categories, calling findAllCategories() in php.php
* @param $categories_count - Count the array size of $categories
* @param $dishes_category - Array to save all dishes with a specific category, calling findMenuDishByCategory() in php.php
* @param $dishes_category_count - Count the array size of $dishes_category
**/
function printViewMenu(){
    $categories = findAllCategories();
    $categories_count = count($categories);
    for ($i = 0; $i < $categories_count; ++$i){ //Array that runs all categories array
        print "<table>";
        printf("<tr><th class='dish'>%s</th><th class='price'>Price</th></tr>", $categories[$i]);
        $dishes_category = findMenuDishByCategory($categories[$i]);
        $dishes_category_count = count($dishes_category);
        for ($a = 0; $a < $dishes_category_count; ++$a){ //Array that runs all dishes_category array
                printf("<tr><td class='dish'>%s</td>", $dishes_category[$a][2]); 
                printf("<td class='price'>%s €</td></tr>", $dishes_category[$a][3]); 
        };
        print "</table>";
    };
}

/**
* Function that print ViewMenu into HTML
* @param $categories - Array for save all categories, calling findAllCategories() in php.php
* @param $categories_count - Count the array size of $categories
* @param $dishes_category - Array to save all dishes with a specific category, calling findDayMenuByCategory() in php.php
* @param $dishes_category_count - Count the array size of $dishes_category
**/
function printDayMenu(){
    $categories = findAllCategories();
    $categories_count = count($categories);
    for ($i = 0; $i < $categories_count; ++$i){ //Array that runs all categories array
        print "<div>";
        printf("<h1>%s</h1>", $categories[$i]);
        $dishes_category = findDayMenuByCategory($categories[$i]);
        $dishes_category_count = count($dishes_category);
        print "<ul>";
        for ($z = 0; $z < $dishes_category_count; ++$z){ //Array that runs all dishes_category array
            printf("<li>%s</li>", $dishes_category[$z][2]); 
        };
        print "</ul>";
        print "</div>";
    };
}

?>