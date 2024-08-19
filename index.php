<?php
// Подключение файла автозагрузки
require_once "./autoload.php";

// Подключение контроллера
use Test\Controllers\NewsController;

// Создание экземпляра контроллера
$controller = new NewsController();

$url = $_SERVER['REQUEST_URI'];


if ($url == "/") {
	include './Views/layout/layout.php';
} elseif ($url == "/news/") {
	// ---Вывод основной информации для страницы новостей---
    $controller->actionList(1);
} elseif (preg_match("{^/news/(\d+)/$}", $url, $id)) {
	// ---Вывод основной информации для страницы одной конкретной новости---
    $controller->actionDetail($id[1]);
} elseif (preg_match("{^/news/page-(\d+)/$}", $url, $pageNum)) {
    // ---Вывод основной информации для страницы новостей---
    $controller->actionList($pageNum[1]);
} 
