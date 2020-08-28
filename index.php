<?php 
	include_once 'singleton.php';

	//调用数据库连接单例类
	$sing_db = Singleton::getInstance('127.0.0.1', 'root', '123456', 'phper_advance');
	$res = $sing_db->query('select * from user');
	print_r($res->fetch_assoc());