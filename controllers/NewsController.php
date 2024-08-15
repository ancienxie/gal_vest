<?php
	// Подключение модели
	require_once '../models/NewsModel.php';

	class NewsController
	{
		// Количество новостей на странице
		private $limit = 4;
		
		public function actionList($pageNum)
		{
			// Получение списка новостей начиная с самой ранней
			$row = NewsModel::getLast();

			// Вычисляем offset для SQL запроса
			$offset = ($pageNum - 1) * $this->limit;
			$news = NewsModel::getRows($offset, $this->limit);

			// Получение общего кол-ва новостей
			$pagesAmount = NewsModel::getCount();

			// Текущая страница новостей
			$currNewsPage = $pageNum;

			// Подключение верстки
			include "../layout/homePage.php";	
		}

		public function actionDetail($id)
		{
			// Получение всей информации о новости
			$row = NewsModel::getItem($id);

			// Подключение верстки
			include "../layout/newsPage.php";	
		}
	}
?>