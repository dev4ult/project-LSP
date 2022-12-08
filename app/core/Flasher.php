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

            $data['msg'] = $_SESSION['flash']['msg'];
            $data['type'] = $_SESSION['flash']['type'];

            echo "<div class='alert " . $_SESSION['flash']['msg'] . " shadow-lg'>
            <div>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'
                    class='stroke-info flex-shrink-0 w-6 h-6'>
                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                        d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                </svg>
                <span>" . $_SESSION['flash']['type'] . "</span>
            </div>
            <div class='flex-none'>
                <button class='btn btn-sm btn-ghost'>Deny</button>
                <button class='btn btn-sm btn-primary'>Accept</button>
            </div>
        </div>";
            // require_once '../app/views/templates/alert.php';
            unset($_SESSION['flash']);
        }
    }
}