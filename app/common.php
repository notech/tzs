<?php
//我的函数

function getRandomImg() {
	$arr = array(
		'http://www.kamakura-zuisenji.or.jp/imgs/garden/p1.jpg',
		'http://www.kamakura-zuisenji.or.jp/imgs/garden/p2.jpg'
	);

	$key = mt_rand(0,count($arr) - 1);

	return $arr[$key];
}

function getNav() {
	return Nav::all();
}