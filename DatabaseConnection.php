<?php

class DatabaseConnection 
{
    protected $db_host;
    protected $db_username;
    protected $db_password;
    protected $db_databasename;
    protected $db_port;
    protected $db_socket;
    protected $mysql;

    public function __construct() 
    {
        $this->db_host = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->db_databasename = 'latihan_php';
        $this->db_port = '';
        $this->db_socket = '';
        $this->db_connect();
    }

    private function db_connect()
    {
        $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_databasename);
        if ($this->mysqli->connect_error) {
            die('Connection Failed '.$this->mysqli->connect_error);
        }
    }

    public function selectData($table, $column)
    {
        $this->db_connect();
        $query = "SELECT * FROM ".$table." ORDER BY ".$column;
        $query = $this->mysqli->query($query);

        return $query;
    }

    public function selectSingleRecord($table, $id)
    {
        $this->db_connect();
        $query = "SELECT * FROM ".$table." WHERE id = ".$id;
        $query = $this->mysqli->query($query);

        return $query;
    }

    public function updateData($nama, $nim, $prodi, $id)
    {
        $this->db_connect();
        $query = sprintf("UPDATE mahasiswa SET nama = '%s', nim = '%s', prodi = '%s' WHERE id = %d",
                    $this->mysqli->real_escape_string($nama),
                    $this->mysqli->real_escape_string($nim),
                    $this->mysqli->real_escape_string($prodi),
                    $id
                );

        $query = $this->mysqli->query($query);

        if (isset($query)) {
            return 'Data Updated!';
        } else {
            return "FAILED to execute UPDATE query!";
        }
    }

    public function insertData($nama, $nim, $prodi)
    {
        $this->db_connect();
        $query = sprintf("INSERT INTO mahasiswa (nama, nim, prodi) VALUES ('%s', '%s', '%s')", 
                    $this->mysqli->real_escape_string($nama),
                    $this->mysqli->real_escape_string($nim),
                    $this->mysqli->real_escape_string($prodi),
                );
        
        $query = $this->mysqli->query($query);

        if (isset($query)) {
            return $query;
        } else {
            return "FAILED to execute INSERT query!";
        }
    }

    public function deleteData($table, $id)
    {
        $this->db_connect();
        $query = "DELETE FROM ".$table." WHERE id = ".$id;

        $query = $this->mysqli->query($query);

        if (isset($query)) {
            return 'Data deleted successfully!';
        } else {
            return "FAILED to execute DELETE query!";
        }
    }
}

?>