<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../stylesheet/main.css">
	<title>Галактический вестник</title>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<!-- Header -->
	<div class="top-menu">
		<ul class="top-menu__elements">
			<li>
				<img src="../images/logo.png" alt="Галактический вестник">
			</li>
			<?php
			$menu = [
				[
					"link"=>"../",
					"text"=>"Главная"
				],
				[
					"link"=>"../Views/navigation/company.php",
					"text"=>"О компании"
				],
				[
					"link"=>"../Views/navigation/contacts.php",
					"text"=>"Контакты"
				],
			];

			foreach($menu as $item)
			{
			?>
			<li>
				<a href="<? echo $item["link"]?>"><p class="top-menu__elements--p"><?=$item["text"];?></p></a>
			</li>
			<?php
			}
			?>
		</ul>
	</div>
	<hr>
	<!-- Header -->

	<!-- Контент -->
	<?=$content?>
	<!-- Контент -->

	<!-- Footer -->
	<div class="footer">
		<hr class="footer__line">
		<p class="footer__text">© 2023 — 2412 «Галактический вестник»</p>
	</div>
	<!-- Footer -->
</body>