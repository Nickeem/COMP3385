<?php 
include_once 'C:\xampp\htdocs\COMP3385\COMP3385\Assignment2\400008889\framework/autoload.php';
abstract class Model /*implements ModelInterface */
{
    private $host;
    private $database;
    private $username;
    private $password;
    protected $db;
    protected $table;
    protected $select = '*';
    protected $fields = '';
    protected $values = [];
    protected $set = [];
    protected $where = [];
    protected $orderBy = [];
    protected $limit = null;


    public function __construct($table)
    {
        $this->table = $table;
        if (defined('HOST') && defined('DATABASE') && defined('USERNAME') && defined('PASSWORD')) 
        {
            $this->connect(HOST, DATABASE, USERNAME, PASSWORD);
        }

    }
    public function connect($host, $database, $username, $password)
    {
        $this->db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    }

    // public function create($table, $data)
    // {
    //     $fields = implode(', ', array_keys($data));
    //     $values = array_values($data);
    //     $value_placeholders =  array_fill(0, count($values), '?');
    //     $value_placeholders =  implode(', ', $value_placeholders);
    //     $sql_statement = 'INSERT INTO '.$table.' (' . $fields . ') VALUES (' . $value_placeholders . ');';

    //     $insert_query = $this->db->prepare($sql_statement);
    //     $insert_query->execute($values); 

    // }
	// public function get($table, $fields, $filter)
    // {
    //     $fields_str =  implode(', ', $fields);

    // }
	// public function update($table, $field, $value, $filter)
    // {

    // }
	// public function remove($table, $filter)
    // {

    // }



    public function select($columns) 
    {
        $this->select = $columns;
        return $this;
    }
    
    public function fields($columns) 
    {
        $this->fields = $columns;
        return $this;
    }

    public function values($values)
    {
        if (gettype($values) == "array") 
        {
            $this->values = $values;
        }
        return $this;
    }

    public function set($field, $value)
    {
        $this->set[] = "$field = ?";
        $this->values[] = $value;
        return $this;
    }

    public function where($column, $operator, $value) 
    {
        $this->where[] = "$column $operator '$value'";
        return $this;
    }

    public function orderBy($column, $direction) 
    {
        $this->orderBy[] = "$column $direction";
        return $this;
    }

    public function limit($limit) 
    {
        $this->limit = $limit;
        return $this;
    }

    public function resetContents()
    {
    $this->select = '*';
    $this->values = [];
    $this->fields = '';
    $this->set = [];
    $this->where = [];
    $this->orderBy = [];
    $this->limit = null;
    }

    public function get() {
        $query = "SELECT $this->select FROM $this->table";
        
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }

        if (!empty($this->orderBy)) {
            $query .= " ORDER BY " . implode(", ", $this->orderBy);
        }

        if ($this->limit !== null) {
            $query .= " LIMIT $this->limit";
        }
        echo $query;
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create() {
        $query = "INSERT INTO $this->table($this->fields) ";

        $value_placeholders =  array_fill(0, count($this->values), '?');
        $value_placeholders =  implode(', ', $value_placeholders);

        $query .= " VALUES ($value_placeholders)";

        $statement = $this->db->prepare($query);
        $statement->execute($this->values);


        $this->resetContents();
    }
    
    public function update() {
        $query = "UPDATE $this->table SET ";
        $query .= implode(', ', $this->set);
        
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }
        
        $statement = $this->db->prepare($query);
        $statement->execute($this->values);

        $this->resetContents();
    }
    
    public function remove() 
    {
        $query = "DELETE FROM $this->table";
        if (!empty($this->where)) {
            $query .= " WHERE " . implode(" AND ", $this->where);
        }
        else {
            throw new Exception("No filter was specified when deleting from '$this->table'");
        }
        
        $statement = $this->db->prepare($query);
        $statement->execute($this->values);
        $this->resetContents();
    }

}

/*


*/

