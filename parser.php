<?php
/**
 * @var string $website_url
 */
$website = file_get_contents($website_url);

// Парсим стандартные данные сайта
preg_match('/<title>(.*?)<\\/title>/is' , $website , $title); // $title - переменная заголовка
preg_match('/<meta name="description" content="(.*?)">/is' , $website , $description); // $description - переменная описания страницы
