<?php

session_start();

if(!isset ($_SESSION['user'])){
   $_SESSION['user'] = [];
}
if(!isset ($_SESSION['isLogged'])){
    $_SESSION['isLogged'] = false;
}


class User
{
    public function __construct()
    {
        $this->user = $_SESSION['user'];
    }

    public function login($companyName, $fullName, $email, $phone, $service)
    {
        
            $_SESSION['user'] = [
                'companyName' => $companyName,
                'fullName' => $fullName,
                'email' => $email,
                'phone' => $phone,
                'service' => $service,
            ];
           $this->setUserLogged(true);
    }

    public function logout()
    {
        $_SESSION['user'] = [];
    }

    public function setUserLogged($bool){
        $_SESSION['isLogged'] = $bool;
    }

    public function isLoggedIn(){
        return $_SESSION['isLogged'];
    }

    public function isLogin()
    {
        return !empty($_SESSION['user']);
    }
}