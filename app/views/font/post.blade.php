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
			    @foreach(getNav() as $post)
			    <a href="{{$post->url}}">{{$post->title}}</a>
				@endforeach
			</div>
		</div>
	</div>
	<div class="content">
		<div class="cont_box">
			<h3 class="desc_title">{{$post->post_title}}</h3>
			<div class="desc_text">
				{{$decode}}
			</div>

			<div class="imgwrap"><img src="{{getRandomImg()}}" alt=""/></div>
		</div>
	</div>
	<div class="content">
		<div class="cont_box">
			<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="{{$post->id}}" data-title="{{$post->post_title}}" data-url="http://tianzengsi.com/p/{{$post->id}}"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"tianzengsi"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.unstable.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->
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
