{config_load file='template.conf'}
<html lang="{#lang#}">
<head>
	<meta charset="utf-8">
	<meta name="author" content="{#author#}">
	<meta name="description" content="{#description#}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="http://{$smarty.server.SERVER_NAME}:{$smarty.server.SERVER_PORT}/">
	<title>{#title#}</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47"
		  crossorigin="anonymous">
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-old-ie-min.css">
	<![endif]-->
	<!--[if gt IE 8]><!-->
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
	<!--<![endif]-->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="{#dir#}/css/propel-old-ie.css">
	<![endif]-->
	<!--[if gt IE 8]><!-->
	<link rel="stylesheet" href="{#dir#}/css/propel.css">
	<!--<![endif]-->
</head>
<body>
<div class="header">
	<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
		<a class="pure-menu-heading" href="">Propel2</a>
		<ul class="pure-menu-list">
			<li class="pure-menu-item"><a href="/" class="pure-menu-link">Home</a></li>
			<li class="pure-menu-item"><a href="user/list" class="pure-menu-link">Users</a></li>
		</ul>
	</div>
</div>