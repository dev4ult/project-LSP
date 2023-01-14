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

            require '../app/views/templates/alert/' . $flash['type'] . '.php';
            unset($_SESSION['flash']);
        }
    }
}