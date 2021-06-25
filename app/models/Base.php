<?php


namespace App\models;


class Base
{
    protected  $db;
    protected   $table = '';
    public function __construct()
    {
        $this->db = new \PDO('mysql:dbname=nanti_api;host=localhost;','root','');

    }

    public function destroy($id){
        $sql = "DELETE FROM {$this->table} WHERE id = '$id'";
        $res = $this->db->query($sql);

        return $res ? json_encode(['success'=>true]) : json_encode(['success'=>false]);

    }

    public function store($columns=[], $values=[]){
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
                return json_encode(['success'=>true]);
            }else{
                return json_encode(['success'=>false, 'message'=>$stmt->errorInfo()]);
            }

        }catch(\Exception $e){
            return json_encode(['success'=>false, 'message'=>$e]);
        }

    }

    public function update($columns=[], $values=[], $id){
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

    }


    public function all($sort=' order by id desc', $extra= ''){
        $sql = '';
        if($sort == null)
            $sql = "SELECT * FROM $this->table $extra $sort";
        else
            $sql = "SELECT * FROM $this->table $extra $sort";

//        echo $sql;

        $data = [];
        try {
            $result = $this->db->query($sql);
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);

        }catch (\Exception $e){
            var_dump($e);
        }
        return json_encode($data);
    }
    public function raw($sql=null){
        $data = [];
        try {
            $result = $this->db->query($sql);
            $data = $result ? $result->fetchAll(\PDO::FETCH_ASSOC) :[];

        }catch (\Exception $e){
            var_dump($e);
        }
        return json_encode($data);
    }

    public function findById($id){
        $sql = "SELECT * FROM $this->table WHERE id='$id'";
        $data = [];
        try {
            $result = $this->db->query($sql);
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);

        }catch (\Exception $e){
            var_dump($e);
        }
        return json_encode($data);
    }

    public function find($field, $value){
        $sql = "SELECT * FROM $this->table WHERE $field = '$value'";
//        echo $sql;
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
