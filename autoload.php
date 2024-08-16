<?php
// Функция автозагрузки классов
spl_autoload_register(function ($class) 
{
	// Преобразуем namespace в путь к файлу
	$prefix = 'Test\\'; // Префикс пространства имен
	$baseDir = __DIR__ . '/'; // Базовая директория проекта

	// Проверяем, начинается ли имя класса с префикса
	$len = strlen($prefix);

	// Получаем относительное имя класса
	$relative_class = substr($class, $len);

	// Заменяем namespace разделители на разделители директорий и добавляем .php
	$file = $baseDir . str_replace('\\', '/', $relative_class) . '.php';

	// Если файл существует, подключаем его
	if (file_exists($file)) 
	{
		require_once $file;
	}
});