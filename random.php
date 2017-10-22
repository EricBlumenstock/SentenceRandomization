<html>
	<body>
	 
		<?php
			$file = $_GET['file'];
			$myfile = fopen($file, "r") or die("Invalid URL");
			
			$placeholder = "|";
			$sentences = json_decode(fgets($myfile));
			$items = json_decode(fgets($myfile));
			
			$x = rand(0, count($sentences)-1);
			$counter = substr_count($sentences[$x], $placeholder);
			for($y=0; $y < $counter; $y++){
				$sentences[$x] = substr($sentences[$x], 0, strpos($sentences[$x], $placeholder)) . $items[rand(0,count($items)-1)] . substr($sentences[$x], strpos($sentences[$x], $placeholder) + strlen($placeholder));
			}
			echo $sentences[$x];
			
			
		
		?>

		<form action="random.php">
			<input id="file" name="file" hidden></input>
			<p>
				<input onClick="setFileQuery(getParameterByName('file'));" type="submit" value="Generate" />
			</p>
		</form>

		 
		<script type="text/javascript">
		 
		 function getParameterByName(name, url) {
			if (!url) {
			  url = window.location.href;
			}
			name = name.replace(/[\[\]]/g, "\\$&");
			var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		
		function setFileQuery(name){
			document.getElementById("file").value = name;
		}
		 // ucs-2 string to base64 encoded ascii
		 function utoa(str) {
			return window.btoa(unescape(encodeURIComponent(str)));
		}
		// base64 encoded ascii to ucs-2 string
		function atou(str) {
			return decodeURIComponent(escape(window.atob(str)));
		}

		</script>
	 
	</body>
</html>