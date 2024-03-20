<?php
if (session_status() === PHP_SESSION_NONE) {

    session_start();
}

// session_start();

// if (!isset ($_SESSION['companyName'])) {
//     $_SESSION['companyName'] = '';
// }

// if (!isset ($_SESSION['fullName'])) {
//     $_SESSION['fullName'] = '';
// }

// if (!isset ($_SESSION['email'])) {
//     $_SESSION['email'] = '';
// }

// if (!isset ($_SESSION['phone'])) {
//     $_SESSION['phone'] = '';
// }

// if (!isset ($_SESSION['service'])) {
//     $_SESSION['service'] = '';
// }

// if (!isset ($_SESSION['isLogged'])) {
//     $_SESSION['isLogged'] = false;
// }


class User
{
    public function __construct()
    {
        if (isset ($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        }
    }

    public function login($companyName, $fullName, $email, $phone, $service, $isLogged = true)
    {

        $_SESSION['companyName'] = $companyName;
        $_SESSION['fullName'] = $fullName;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['service'] = $service;
        $_SESSION['isLogged'] = $isLogged;
        $this->setUserLogged(true);
    }

    public function logout()
    {
        $_SESSION['user'] = [];
    }

    public function setUserLogged($bool)
    {
        $_SESSION['isLogged'] = $bool;
    }

    public function isLoggedIn()
    {
        return $_SESSION['isLogged'];
    }

}