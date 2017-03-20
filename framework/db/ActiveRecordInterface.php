<?php 

interface ActiveRecordInterface 
{
	public static function tableName();

	public function findOne($pk);
	public function findAll();

	public function deleteOne($pk);

	public function save($data);
}