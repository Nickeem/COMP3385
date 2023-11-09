<?php 
interface ModelInterface {	
	public function connect($host, $database, $username, $password);
	public function create($table, $filter);
	public function get($table, $fields, $filter);
	public function update($table, $field, $value, $filter);
	public function remove($table, $filter);
}