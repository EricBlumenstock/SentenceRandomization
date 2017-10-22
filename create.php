<html>
	<body>
	
		<?php
			if (isset($_POST["file"]) && isset($_POST["sentences"]) && isset($_POST["items"]))
			{
				$file_name = base64_encode($_POST["file"] . ".json");
				$thingSeparator = PHP_EOL;
				$sentences = explode($thingSeparator, $_POST["sentences"]);
				$items = explode($thingSeparator, $_POST["items"]);
				$placeholder = "|";

				$message = json_encode($sentences) . PHP_EOL . json_encode($items);
				
				file_put_contents($file_name, $message);
				header( 'Location: ./random.php?file=' . $file_name ) ;
				
			}
		?>

	</html>
</body>