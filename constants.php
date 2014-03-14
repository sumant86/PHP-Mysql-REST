<?php
class Constants{
	const DB_USERNAME ="xxxxxx";
	const DB_PASSWORD = "xxxxxxx";
	const DB_DBNAME = "xxxxxxxx";
	const DB_SERVERNAME = "xxxx";
	
	public static function getDBUserName(){
		return self::DB_USERNAME;
	}
	
	public static function getDBPassword(){
		return self::DB_PASSWORD;
	}
	
	public static function getDBDataBaseName(){
		return self::DB_DBNAME;
	}
	
	public static function getDBServerName(){
		return self:: DB_SERVERNAME;
	}
	
	public static function getDSN(){
		$dsn = 'mysql:dbname='.self::DB_DBNAME.';host='.self::DB_SERVERNAME;
		return $dsn;
	}
}
