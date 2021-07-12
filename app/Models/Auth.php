<?php


namespace App\Models;


class Auth extends Base
{
    protected $table = 'users';

    public function login($username, $password)
    {
        $username = trim($username);
        $password = trim($password);
        $data = [];
        $data['success'] = false;
        $data['message'] = 'Incorrect username and password combination';

        $user = parent::find('username', $username);
        if ($user) {
            $u_password = $user[0]['password'];
            if (password_verify($password, $u_password)) {
                $data['message'] = 'user authenticated';
                $data['success'] = true;
                $data['data'] = $user[0];

            }

        }
        return json_encode($data);
    }

    public function usernameExist($username):bool
    {
        $result = parent::find('username', $username);
        if($result)
            return true;
        return false;

    }





}
