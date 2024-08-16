<?php 
// Подключение файла автозагрузки
require_once "./autoload.php";

// Подключение контроллера
use Test\Controllers\NewsController;

// Создание экземпляра контроллера
$controller = new NewsController();

// Получение номера статьи
$id = $_GET['id'] ?? 0;


// ---Верстка и вывод основной информации---
$controller->actionDetail($id);