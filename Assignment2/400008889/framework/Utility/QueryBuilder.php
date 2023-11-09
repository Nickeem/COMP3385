<?php
/*
trait QueryBuilder {
    protected $connection;
    protected $table;
    protected $select = '*';
    protected $where = [];
    protected $orderBy = [];
    protected $limit = null;

    public function __construct(PDO $connection, $table) {
        $this->connection = $connection;
        $this->table = $table;
    }

    public function select($columns) {
        $this->select = $columns;
        return $this;
    }

    public function where($column, $operator, $value) {
        $this->where[] = "$column $operator '$value'";
        return $this;
    }

    public function orderBy($column, $direction) {
        $this->orderBy[] = "$column $direction";
        return $this;
    }

    public function limit($limit) {
        $this->limit = $limit;
        return $this;
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

        $statement = $this->connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
*/
?>