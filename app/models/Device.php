<?php


namespace App\models;


class Device extends  Base
{
    protected $table = 'devices';

    public function serialNumberExist($serialNumber){
        $res = $this->db->query("SELECT * FROM devices WHERE serialNumber='$serialNumber'");
        if($res) $res= $res->fetch();
        return $res ? true : false;
    }

}
