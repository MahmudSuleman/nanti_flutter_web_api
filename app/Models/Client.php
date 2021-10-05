<?php


namespace App\Models;


class Client extends Base
{
    protected $table = 'clients';


    public function all($extra = ' where 1', $sort = ' '): array
    {
        $result = $this->db->query('select * from view_clients');
        return $result ? $result->fetchAll(\PDO::FETCH_ASSOC) : [];
       
    }

}