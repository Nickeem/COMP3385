<?php 
namespace Interfaces;
interface ModelInterface {	
	public function connect($host, $database, $username, $password);
	public function create();
	public function get();
	public function update();
	public function remove();
}