<?php

use think\Env;
return [
	// +----------------------------------------------------------------------
	// | 数据库设置
	// +----------------------------------------------------------------------
		'hostname'        => Env::get('database.hostname'),
		// 数据库名
		'database'        =>Env::get('database.database'),
		// 数据库用户名
		'username'        =>Env::get('database.username'),
		// 数据库密码
		'password'        => Env::get('database.password'),
		// 数据库连接端口
		'hostport'        => Env::get('database.hostport'),
		'datetime_format' => false,
];