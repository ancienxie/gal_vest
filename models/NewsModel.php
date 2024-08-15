<?php
	// Подключение БД
	require_once "/var/www/workspace/test/www/DB/DataBase.php";

	class NewsModel
	{
		public static function getCount()
		{
			$sql = "SELECT COUNT(*) FROM news;";
			$count = DataBase::getData()->query($sql)->fetchColumn();
			return ceil($count / 4);	
		}

		public static function getRows($offset, $limit)
		{
			// Запрашиваем последние новости с учетом пагинации
			$sql = "SELECT *, DATE_FORMAT(`date`, '%d.%m.%Y') as news_date FROM news ORDER BY `date` DESC LIMIT :limit OFFSET :offset";
			$stmt = DataBase::getData()->prepare($sql);
			$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
			$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public static function getLast()
		{
			return DataBase::getData()->query(DataBase::getRequest())->fetch();
		}

		public static function getItem($id)
		{
			$sql = "SELECT *, DATE_FORMAT(`date`,'%d.%m.%Y') news_date FROM news WHERE id=?";
			$res = DataBase::getData()->prepare($sql);
			$res->bindValue(1,$id,PDO::PARAM_INT);
			$res->execute();
			return $res->fetch();
		}
}