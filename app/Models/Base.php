<?php


namespace App\Models;


class Base
{
    protected  $db;
    protected   $table = '';
    public function __construct()
    {
        $this->db = new \PDO('mysql:dbname=nanti_api;host=localhost;','root','');

    }

    public function destroy($id):array
    {
        $sql = "DELETE FROM {$this->table} WHERE id = '$id'";
        $res = $this->db->query($sql);

        return $res ? ['success'=>true] : ['success'=>false];

    }

    public function store($columns, $values):array
    {
        $sql = "INSERT INTO ". $this->table ." (";
        foreach ($columns as $column){
            $sql .= "$column, ";
        }
        $sql .= ") VALUES (";
        foreach ($values as $value){
            $sql .= "'$value', ";
        }
        $sql .= ")";

        $sql = str_replace(", )", ')', $sql);
//        echo $sql;

        try{
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            if($stmt->errorInfo()[1] == ''){
                return ['success'=>true];
            }else{
                return ['success'=>false, 'message'=>$stmt->errorInfo()];
            }

        }catch(\Exception $e){
            return ['success'=>false, 'message'=>$e];
        }

    }

    public function update( $id, $columns=[], $values=[]){
        $sql = "UPDATE ". $this->table ." SET ";
        for($i = 0 ; $i <= count($columns) -1; $i++){
            $sql .= "{$columns[$i]} = '". $values[$i] ."',";
        }
        $sql = substr( $sql, 0, -1);


        $sql .= " WHERE id = '". $id ."'";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            if($stmt->errorInfo()[1] == ''){
                return json_encode(['success'=>true]);
            }else{
                return json_encode(['success'=>false, 'message'=>$stmt->errorInfo()]);
            }

        }catch(\Exception $e){
            return json_encode(['success'=>false, 'message'=>$e]);
        }

//        echo $sql;

    }


    public function all($extra= ' where 1', $sort=' '): array
    {
        $sql = "SELECT * FROM $this->table $extra $sort";
        $data = [];
        try {
            $result = $this->db->query($sql);
            $data =$result ? $result->fetchAll(\PDO::FETCH_ASSOC) : [];

        }catch (\Exception $e){
            var_dump($e);
        }
        return $data;
    }

    public function raw($sql=null): array
    {
        $data = [];
        try {
            $result = $this->db->query($sql);
            $data = $result ? $result->fetchAll(\PDO::FETCH_ASSOC) :[];

        }catch (\Exception $e){
            var_dump($e);
        }
        return $data;
    }

    public function findById($id): array
    {
        $sql = "SELECT * FROM $this->table WHERE id='$id'";
        $data = [];
        try {
            $result = $this->db->query($sql);
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);

        }catch (\Exception $e){
            var_dump($e);
        }
        return ($data);
    }

    public function find($field, $value): array
    {
        $sql = "SELECT * FROM $this->table WHERE $field = '$value'";
        $data = [];
        try {
            $result = $this->db->query($sql);
            $data = $result ? $result->fetchAll(\PDO::FETCH_ASSOC): [];
        }catch (\Exception $e){
            var_dump($e);
        }
        return $data;
    }

}