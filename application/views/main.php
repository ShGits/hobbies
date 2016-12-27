<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
 <head>
   <title>Your hobby</title>
   <meta charset="utf-8">
<!-- тут была такая реализация, но перестала работать. -->
<!-- <link rel='stylesheet' href=' < ? php echo base_url(); ?>/css/style.css'> -->

	<link rel='stylesheet' href='../../css/style.css'/>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

</head>
 <body>
 	<header>
		<div class='logo'>
			<p>Your hobby</p>
		</div>
		<menu class='menu1'>
			<a href='#begin'><li>Головна</li></a>
			<a href='#menu'><li>Каталог</li></a>
			<a href='#end'><li>Про проект</li></a>
			<a href='#end'><li>Контакти</li></a>
<!-- тут я добавил -->
            <li><a href='users'>Login</a></li>

		</menu>
	</header>
	<div><a name='begin' style='visibility: hidden;'></a><div><!-- ссылка для главной страницы--->
	<div class='container'>
			<h1 class='tx'>Шукаєш натхнення <br>для своїх захоплень?</h1>
			<h2 class='tx'>Тобі сюди <a href='#menu'><div id='arrow'></div></a></h2>
	</div>
	<a name='menu' ></a><!-- ссылка для стрелки и каталога--->
	<main class='main'>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/embroidery.jpg'/></a>
			<a href='dg'><figcaption>Вишивка</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/knitting.jpg'/></a>
			<a href='dg'><figcaption>В`язання</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/decoupage.jpg'/></a>
			<a href='dg'><figcaption>Декупаж</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/paint.jpg'/></a>
			<a href='dg'><figcaption>Живопис</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/quilling.jpg'/></a>
			<a href='dg'><figcaption>Квілінг</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/music.jpg'/></a>
			<a href='dg'><figcaption>Музика</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/krapbooking.jpg'/></a>
			<a href='dg'><figcaption>Скрапбукінг</figcaption></a>
		</figure>
		<figure>
			<a href='dg'><img class='folder' src='../../content/menu/sewing.jpg'/></a>
			<a href='dg'><figcaption>Шиття</figcaption></a>
		</figure>
	</main>
	<a name='end' style='visibility: hidden;'></a><!-- ссылка для футера--->
	<section class='footer'>
		<div class='about'>
			<div class='block_info'>
				<h1>Про проект<h1>
				<p>Ця сторінка є моєю першою більш-менш повноцінною розробкою. <br>
				Відповідно до задуму, вона створена для того, щоб дати натхнення тим, <br>хто займається якось творчою справою. <br>
				Кожен тематичний блок міститиме відповідні картинки, фотографії, відео.</p>
			</div>
		</div>
		<div class='contacts'>
			<p class='info'>Розробник Шека Єлізавета <br>
			Із питаннями звертатися на адресу ??? <br>
			<span style='font-family: Pacifico, cursive;'>Your hobby</span>&copy2016</p>
		</div>
	</section>
 </body>
</html>


