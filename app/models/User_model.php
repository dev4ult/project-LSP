<?php

class User_model {
    // client side data after login
    public $username;
    public $user_type;

    public function __construct() {
        self::$username = 'Guest1001';
    }
}