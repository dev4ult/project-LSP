<?php

class Flasher {
    public static function setFlash($msg = 'default message for alert', $type = '') {
        $_SESSION['flash'] = [
            "msg" => $msg,
            "type" => $type
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];

            $data['msg'] = $flash['msg'];
            $data['type'] = $flash['type'];

            require '../app/views/templates/alert.php';
            unset($_SESSION['flash']);
        }
    }
}