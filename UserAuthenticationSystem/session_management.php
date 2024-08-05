<?php

ini_set('session.gc_maxlifetime', 1800);
session_set_cookie_params(1800);

session_start();
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 1800) {
    session_unset();
    session_destroy();
}
$_SESSION['last_activity'] = time();
