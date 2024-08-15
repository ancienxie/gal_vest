<?php include "/var/www/workspace/test/www/layout/header.php";?>
<div style="background-image: url(../images/<?=$row['image']?>);" class="ban-image">
		<section   class="ban-image__text">
			<h1 class="ban-image__text--title"><?=$row['title']?></h1>
			<p class="ban-image__text--info"><?=strip_tags($row['announce'])?></p>
		</section>
</div>
<div class="main-info">
	<section class="main-info__title">
				<h1 class="main-info__title--text">Новости</h1>
			</section>

			<section class="main-info__block">
				<?php
					foreach($news as $row)
					{
				?>
					<ul class="main-info__block--news">
						<li class="main-info__block--date"><p><?=$row['news_date']?></p></li>
						<li class="main-info__block--title"><h2><?=$row['title']?></h2></li>
						<li class="main-info__block--text"><p><?=strip_tags($row['announce'])?></p></li>
						<li class="main-info__block--button">
							<a href="./news.php?id=<?=$row['id']?>" class="main-info__block--button--text">
								ПОДРОБНЕЕ<div id="arrow-1"></div>
							</a>
						</li>
					</ul>
				<?php
					}
				?>   
	</section>
</div>
<div class="nav">
		<ul class="nav__elem">
		<?php
			// Формирование ссылок на страницы
			for ($i = 1; $i <= $pagesAmount; $i++): 
		?>
			<li>
				<a href="?page=<?=$i?>" class="nav__elem--button <?=($i == $currNewsPage) ? 'nav__elem--button-flag' : ''?>">
					<?=$i?>
				</a>
			</li>
		<?php 
			endfor; 
		?>
			<li class="nav__elem--button-li"><a href="?page=<?=min($currNewsPage + 1, $pagesAmount)?>"><div class="nav_elem--button--arrow" id="arrow-2"></div></a></li>
		</ul>
</div>
<?php include "/var/www/workspace/test/www/layout/footer.php";?>