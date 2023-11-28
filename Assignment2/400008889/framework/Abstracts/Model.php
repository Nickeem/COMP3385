<?php 
namespace Abstracts;

include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';

abstract class Model implements \Interfaces\ModelInterface 
{
    private $host;
    private $database;
    private $username;
    private $password;
    protected $db = null;
    protected $table; // table required for querying
    protected $select = '*'; // fields to be selected in get operation
    protected $fields = '';  // fields to be updated in update operation
    protected $insertValues = []; // array of values used in create operations
    protected $whereValues = []; // array of values used in where clauses
    protected $setValues = []; // array of values used in update operations
    protected $setFields = []; // array of fields used in update operations
    protected $where = []; // array of conditions used in get
    protected $orderBy = []; // array of strings in format "FIELD DIRECTION"
    protected ?int $limit = null; // 


    public function __construct($table)
    {
        $this->table = $table;
        // check if config variables are set
        if (defined('HOST') && defined('DATABASE') && defined('USERNAME') && defined('PASSWORD')) 
        {
            $this->connect(HOST, DATABASE, USERNAME, PASSWORD);
        }

    }
    public function connect($host, $database, $username, $password)
    {
        try {
            $this->db = new \PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exceptions\ModelConnectionException($e->getMessage(), $e->getCode(), $e);
        }
        
    }

   

    public function select(String $columns) 
    {
        $this->select = $columns;
        return $this;
    }
    
    public function fields(String $columns) 
    {
        $this->fields = $columns;
        return $this;
    }

    public function values(array $values)
    {
        if (gettype($values) == "array") 
        {
            $this->insertValues = $values;
        }
        return $this;
    }

    public function set(String $field, $value)
    {
        $this->setFields[] = "$field = ?";
        $this->setValues[] = $value;
        return $this;
    }

    public function where($column, $operator, $value) 
    {
        $valid_operators = ['=', '<>', '!=', '<', '>', '<=', '>='];
        if (!in_array($operator, $valid_operators))
        {
            throw new \Exceptions\ModelQueryDesignerException('Invalid operator passed to \'where\'');
        }
        $this->where[] = "$column $operator ?";
        $this->whereValues[] = $value;
        return $this;
    }

    public function orderBy($column, $direction) 
    {
        $valid_directions = ['ASC', 'DESC'];
        if (!in_array($direction, $valid_directions))
        {
            throw new \Exceptions\ModelQueryDesignerException("Invalid direction passed to 'orderBy': $direction");
        }
        $this->orderBy[] = "$column $direction";
        return $this;
    }

    public function limit(int $limit) 
    {
        if ($limit <  0)
        {
            throw new \Exceptions\ModelQueryDesignerException("Invalid limit passed to 'limit': $limit");
        } 
        $this->limit = $limit;
        return $this;
    }

    private function clear()
    {
    $this->select = '*';
    $this->insertValues = [];
    $this->whereValues = [];
    $this->setValues = [];
    $this->fields = '';
    $this->setFields = [];
    $this->where = [];
    $this->orderBy = [];
    $this->limit = null;
    }

    public function get() {
        $this->checkConnection();
        $query = "SELECT $this->select FROM $this->table";
        
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }

        if (!empty($this->orderBy)) {
            $query .= " ORDER BY " . implode(", ", $this->orderBy);
        }

        if ($this->limit != null) {
            $query .= " LIMIT $this->limit";
        }
        // echo $query;
        $statement = $this->db->prepare($query);
        $statement->execute($this->whereValues);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function create() {
        $this->checkConnection();
        $query = "INSERT INTO $this->table($this->fields) ";

        $value_placeholders =  array_fill(0, count($this->insertValues), '?');
        $value_placeholders =  implode(', ', $value_placeholders);

        $query .= " VALUES ($value_placeholders)";

        $statement = $this->db->prepare($query);
        $statement->execute($this->insertValues);


        $this->clear();
    }
    
    public function update() {
        $this->checkConnection();
        $query = "UPDATE $this->table SET ";
        $query .= implode(', ', $this->setFields);
        
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }
        
        $statement = $this->db->prepare($query);
        $statement->execute($this->setValues + $this->whereValues);

        $this->clear();
    }
    
    public function remove() 
    {
        $this->checkConnection();
        $query = "DELETE FROM $this->table";
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }
        else {
            throw new \Exceptions\ModelQueryDesignerException("No filter was specified when deleting from '$this->table'");
        }
        
        $statement = $this->db->prepare($query);
        $statement->execute($this->whereValues);
        $this->clear();
    }

    private function raiseConnectionError() {
        throw new \Exceptions\ModelConnectionException("No connection was made to a database");
    }
    private function checkConnection() {
        if ($this->db == null)
        {
            $this->raiseConnectionError();
        }
    }
}


