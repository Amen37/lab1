<?php

Interface Account{
public function register ($pdo);
public function login($pdo);
public function changePassword($pdo,$oldPassword,$newPassword);
public function logout ($pdo);
}

?>