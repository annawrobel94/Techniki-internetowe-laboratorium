<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <title>Crawler</title>
	    <link rel="stylesheet" href="crawler.css">
	</head>
	<body>
		<header>
			<h1>Crawler</h1>
			<form name="form" action="" method="get">
				<input type="text" name="url" id="url"><br>
				<input type="submit" name="crawl" value="Crawl!">
			</form>
		</header>
		<main>
			<?php 
				error_reporting(E_ALL ^ E_WARNING);
				if(isset($_GET["url"])){
					$url = $_GET["url"];
					if($url){
						if(filter_var($url, FILTER_VALIDATE_URL)){
							$dom = new DOMDocument();
							$dom -> loadHTMLFile($url);
							
							
							$links = $dom->getElementsByTagName('a');
			 
							$list = array();
							foreach ($links as $link){
								$new_link = $link->getAttribute('href');
								if(!in_array($new_link, $list)){
							    	array_push($list, $new_link);
								}
							}
							foreach ($list as $link){
								echo '<span>', $link, '</span>';
							}
						} else {
							echo '<span style=color:red;background:none;>'."To nie jest poprawny adres URL!".'</span>';
						}
					}
				}
			?>
		</main>
	</body>
</html> 