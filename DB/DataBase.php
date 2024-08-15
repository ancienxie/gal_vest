<?php
class DataBase
{
	// Подключение БД
	private static $db;

	public static function getData()
	{
		self::$db = new PDO("mysql:host=localhost;dbname=student","root","root");
		return self::$db;
	}
	public static function getRequest()
	{
		return "SELECT * FROM news ORDER BY `date` DESC LIMIT 1";
	}
}