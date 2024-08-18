<?php
class admin
{
    public function isLogin()
    {
        $checkLogin = false;
        if (getSession('loginToken'))
        {
            $tokenLogin = getSession('loginToken');
            $db = new Database();
            //Kiểm tra token có giống trong database không
            $queryToken = $db->oneRaw("SELECT admin_id FROM admin_token WHERE token = '$tokenLogin'");
            if (!empty($queryToken))
            {
                $checkLogin = true;
            } else
            {
                removeSession("loginToken");
            }
        }
        return $checkLogin;
    }
}