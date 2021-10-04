<?php


namespace App\Models;


class Device extends  Base
{
    protected $table = 'devices';

    public function serialNumberExist($serialNumber){
        $res = $this->db->query("SELECT * FROM devices WHERE serialNumber='$serialNumber'");
        if($res) $res= $res->fetch();
        return $res ? true : false;
    }


    public function all($extra = ' where 1', $sort = ' '): array
    {
        $result = $this->db->query('select * from view_manufacturer');
        return $result ? $result->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

}