<?php 

require(FRAMEWORK_PATH . "db/ActiveRecord.php");

class User extends ActiveRecord
{	
	public static function tableName()
	{
		return "users";
	}

	public function login($username, $password)
	{
		// Find user
		$query = $this->_db->prepare("SELECT * FROM ".$this->tableName()." WHERE username = ?");
		$query->bindParam(1, $username, PDO::PARAM_STR);
		$query->setFetchMode(PDO::FETCH_OBJ);
		$query->execute();

		$user = $query->fetch();
		if(!$user)
		{
			return false;
		}

		// Retrieve hash
		$hash = $user->password_hash;;

		// Validate hash
		if(!password_verify($password, $hash))
		{
			return false;
		}

		// Store user login in session
		$_SESSION['user_id'] = $user->id;

		return true;
	}

	public static function isAuthed()
	{
		return isset($_SESSION['user_id']);
	}
}