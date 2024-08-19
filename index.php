<?php
// Подключение файла автозагрузки
require_once "./autoload.php";

// Подключение контроллера
use Test\Controllers\NewsController;

// Создание экземпляра контроллера
$controller = new NewsController();

// Получение текущего URI
$requestUri = $_SERVER['REQUEST_URI'];

// Получаем номер текущего блока новостей из GET-запроса или устанавливаем 1, если номер блока не указан
$pageNum = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Получение номера статьи
$id = $_GET['id'] ?? 0;

// Проверка, соответствует ли URI шаблону главной страницы
if (preg_match('#^/news/?$#', $requestUri)) 
{
    // ---Вывод основной информации для страницы новостей---
    $controller->actionList($pageNum);
}
// Проверка, соответствует ли URI шаблону страницы новостей
else if (preg_match('#^/news/page-([0-9]+)/?$#', $requestUri, $matches)) 
{
    // Получаем номер страницы из регулярного выражения
    $pageNum = (int)$matches[1];
    // ---Вывод основной информации для страницы новостей---
    $controller->actionList($pageNum);
} elseif (preg_match('#^/news/([0-9]+)/?$#', $requestUri, $matches)) 
{
    // Получаем id новости из регулярного выражения
    $id = (int)$matches[1];
    // ---Вывод основной информации для страницы новости---
    $controller->actionDetail($id);
} else 
{
    // Обработка случая, когда URL не соответствует ни одному из шаблонов
    echo "404 Not Found";
}