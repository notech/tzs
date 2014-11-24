<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>{{$post->post_title}} - 内蒙古天增寺</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
	<link rel="stylesheet" href="http://notech.qiniudn.com/amazeui.min.css"/>
	<link rel="stylesheet" href="http://notech.qiniudn.com/postindex.css">
</head>
<body>
	<div class="topnav">
		<div class="topnav_c">
			<a class="logo" href="#"><img src="http://notech.qiniudn.com/logo.gif" alt=""/></a>
			<div class="toplinks">
				<a href="http://tianzengsi.com/p/4">天增寺传说</a>
				<a href="http://tianzengsi.com/p/5">天增寺始末</a>
				<a href="http://tianzengsi.com">天增寺首页</a>
				
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cont_box">
			<h3 class="desc_title">{{$post->post_title}}</h3>
			<div class="desc_text">
				{{$decode}}
			</div>

			<div class="imgwrap"><img src="http://www.kamakura-zuisenji.or.jp/imgs/garden/p1.jpg" alt=""/></div>
		</div>
	</div>
	<div class="footer">
		<p class="footer_c">
			<span id="copyright">Copyright (©) 天增寺 All rights reserved.</span>
			<span id="produced">Produced by</span>
			<a href="http://www.notech.net" target="_blank">notech没技术</a>
		</p>
	</div>
</body>
</html>
