<?php

	if (file_exists("lib/config.php")) {
		require("lib/config.php");
		require("lib/common.php");
	} else {
		header('Location: install.php'); exit();
	}


	if ($_SESSION['config']['rewrite'] == false && strlen($_SERVER['QUERY_STRING']) > 1) {

	echo $_SERVER['QUERY_STRING'];

		$result = mysql_query("SELECT id,url FROM urls WHERE short_url = '{$_SERVER['QUERY_STRING']}'",DBH) or die(mysql_error());	

		if (mysql_num_rows($result) > 0) {

			header("Location: forward.php?".$_SERVER['QUERY_STRING']);

			exit;

		}

	}

	require("lib/header.php");


?>

      <a href="http://<?php echo settingsdb(location); ?>" title="Сервис сокращения ссылок" ><div id="logo"><?php echo settingsdb(name); ?></div></a>
 <h1>Сервис коротких ссылок, введите url для сокращения вашей ссылки!</h1>

<? include("lib/urlcreatebox.php"); ?>	


<div class="clear"></div>



<?php
if(settingsdb(ads) == 1) {
	echo "<div class=\"meelab ad\">".settingsdb(ad_html)."</div>";
}


if(settingsdb(top3) == 1) {
  echo '<div class="span3 meelab home_stats">
      <span>Всего сайтов:</span>
      <p id="urltotal">^_^</p>
    </div>
    <div class="span3 meelab home_stats">
      <span>Общее количество визитов:</span>
      <p id="urlvisits">^_^</p>
    </div>
    <div class="span3 meelab home_stats">
      <span>Хочу такой же сайт:</span>
      <a target="blank" href="http://wm-scripts.ru">wm-scripts.ru</a>
    </div>

 <div class="clearfix"></div>';
}


if(settingsdb(description) == 1) {
  echo '<div class="meela_box meelab">
      <h2>Для чего это нужно?</h2>
      <p>Добро пожаловать в наш сервис сокращения ссылок или рефссылок, вам надоело отправлять длинные url друзьям, которые не помещаются в мессенджерах, не проблема! Этот сервис специально для вас, мы сократим или спрячем любую вашу ссылку или рефссылку, укоротим её и она будет прятной на вид и сосвем беспалевной.</p>
    </div>
';
}


if(settingsdb(recentview) == 1) {
  echo '    <div class="meela_box meelab">
      <h2>Recently Viewed URL\'s</h2>

                <div id="urlrecentview"></div>

    </div>';
}


if(settingsdb(recentcreate) == 1) {
  echo '  <div class="meela_box meelab">
      <h2>Недавно созданные сайты</h2>

                <div id="urlrecent"></div>

    </div>';
}

 ?>


    











</div> <!-- /container -->

<?php require("lib/footer.php"); ?>