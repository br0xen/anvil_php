<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to the Anvil Framework</title>
		<style type="text/css">
			body {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 14px;
				color: #333;
			}
			.welcome_div {
				position:relative;
				margin:15px 0;
				padding:39px 19px 14px;
				background-color:#FFF;
				border:1px solid #DDD;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				border-radius: 4px;
			}
			.welcome_div::after {
				content: "Anvil_PHP";
				position: absolute;
				top: -1px;
				left: -1px;
				padding:3px 7px;
				font-size: 12px;
				font-weight: bold;
				background-color: whiteSmoke;
				border: 1px solid #DDD;
				color: #9DA0A4;
				-webkit-border-radius: 4px 0 4px 0;
				-moz-border-radius: 4px 0 4px 0;
				border-radius: 4px 0 4px 0;
			}
		</style>
	</head>
	<body style="text-align:left; padding-left:50px;">
		<div class="welcome_div">
			Welcome to the Anvil Framework!
			<ul>
				<li>Controllers go in the app/controllers directory</li>
				<li>Models go in the app/models directory</li>
				<li>Views go in the app/views directory</li>
				<li>Libraries/Add-ons go in the app/libraries directory</li>
			</ul>
			<p>If you place the Application Root anywhere other than the default, then you need to change the "APP_ROOT" constant in index.php</p>
			<p>Next, define your main controller in the config.php file</p>
			<p>That is the controller that will run if no other controller is specified.</p>
		</div>
	</body>
</html>
