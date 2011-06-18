<?php defined('PHP_MICRO') or die(); ?>

<!DOCTYPE html>

<html>
<head>
	<title>PHP-Micro</title>

	<style>
		html, body
		{
			margin: 0;
			padding: 0;

			background-color: #333;

			text-align: center;
		}

		#page-container
		{
			margin: 0 auto;
			padding: 5px 20px;

			width: 540px;
			height: 100%;

			border-radius: 0px 0px 15px 15px;
			background-color: #FFF;

			text-align: left;
			box-shadow: 1px 1px 10px #000;
		}

		hr
		{
			width: 100%;
			height: 2px;

			background-color: #333;

			border: none;
		}
	</style>
</head>

<body>
	<div id=page-container>
		<h3>Welcome to PHP-Micro.</h3>

		<hr />

		<p>
			This is a <strong>very</strong> minimal framework
			written in PHP. It exists for the sole purpose of
			providing the functionality needed by almost every
			webapp - and nothing more.
		</p>

		<p>
			It makes use of a consistent class organization
			scheme, alongside any utility classes that the
			developers feel are necessary for most webapps.
		</p>

		<p>
			If you are expecting it to do everything and more -
			and you absolutely must use PHP - then you should
			probably look into another framework such as
			<a href="http://kohanaframework.org">KohanaPHP</a>.
		</p>

		<p>
			<em>
				Note that the developers of PHP-Micro firmly
				believe that large webapps should never be
				developed in the PHP language. The should
				be built in something that scales better
				to a large number requests - which PHP
				is very bad at. There are many
				<a href="http://djangoproject.com">smarter</a>,
				<a href="http://expressjs.com">better</a>,
				and
				<a href="http://sinatrarb.com">simpler</a>
				methods to develop large projects for the web.
				
			</em>
		</p>
	</div>
</body>
</html>

