<?php 

require(FRAMEWORK_PATH . "db/ActiveRecord.php");

class Message extends ActiveRecord
{	
	public static function tableName()
	{
		return "messages";
	}
}