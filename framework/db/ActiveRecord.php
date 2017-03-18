<?php 

include(DB_PATH . "/Pagination.php");
include(__DIR__ . "/ActiveRecordInterface.php");

class ActiveRecord implements ActiveRecordInterface
{
	public $_db;
	public $_primaryKey;

	public $limit = NULL;
	public $offset = NULL;

	public function __construct()
	{
		// Get the active DB instance for use in queries
		$this->_db = Db::getInstance();
	}

	public function getDb()
	{
		return $this->_db;
	}

	public function getPrimaryKey()
	{
		return $this->_primaryKey;
	}

	public function setPrimaryKey($value)
	{
		$this->_primaryKey = $value;
	}

	public static function tableName()
	{
		return '';
	}

	public function findOne($pk)
	{
		$query = $this->_db->prepare("SELECT * FROM `" . $this->tableName() . "` WHERE id = ?");
		$query->bindParam(1, $pk, PDO::PARAM_INT);
		$query->setFetchMode(PDO::FETCH_OBJ);
		$query->execute();

		$result = $query->fetch();

		return $result;
	}

	public function findAll()
	{
		$db = $this->getDb();

		// Build query
		$select = "SELECT * ";
		$from = "FROM `" . $this->tableName() . "`";
		$limit = ($this->limit !== NULL) ? "LIMIT " . $this->limit . " " : '';
		$offset = ($this->offset !== NULL) ? "OFFSET " . $this->offset . " " : '';

		$query = $this->_db->prepare($select.$from.$limit.$offset);
		$query->setFetchMode(PDO::FETCH_OBJ);
		$query->execute();

		$result = $query->fetchAll();

		return $result;
	}

	public function getTotalCount()
	{
		$db = $this->getDb();

		$query = $this->_db->query("SELECT COUNT(id) FROM `" . $this->tableName() . "`");
		$result = $query->fetchColumn();

		return $result;
	}

	public function deleteOne($pk)
	{
		$query = $this->_db->prepare("DELETE FROM `" . $this->tableName() . "` WHERE id = ?");
		$query->bindParam(1, $pk, PDO::PARAM_INT);
		$query->execute();
	}

	public function paginate($page, $limit)
	{
		// Assemble data
		$data = [];
		$data['totalPosts'] = $this->getTotalCount();
		$data['page'] = $page;
		$data['limit'] = $limit;

		$result = new Pagination($data);	

		$this->limit = $result->limit;
		$this->offset = $result->offset;	

		return $result;
	}
}