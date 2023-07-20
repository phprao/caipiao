<?php
define('STYLE_PATH','/Template/admin/');
return [
	'THEME_LIST'             =>  'admin',
	'DEFAULT_THEME'          =>  'admin',

	'safepass'             => '1234',
	'sessiontime'          => '86400',
	'COOKIE_PREFIX'        =>  'admin_',
	'SESSION_PREFIX'       =>  'admin_',
	'xtlooterytoken'       =>'b8869623db6e15f4e87ef961da8dbacd',
	
	//数据库备份配置
	'DB_PATH_NAME'=> 'db',        //备份目录名称,主要是为了创建备份目录；
	'DB_PATH'     => './db/',     //数据库备份路径必须以 / 结尾；
	'DB_PART'     => '1024000',  //该值用于限制压缩后的分卷最大长度。单位：B；建议设置1M
	'DB_COMPRESS' => '0',         //压缩备份文件需要PHP环境支持gzopen,gzwrite函数        0:不压缩 1:启用压缩
	'DB_LEVEL'    => '9',         //压缩级别   1:普通   4:一般   9:最高
	
];