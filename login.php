<?php
include "db_connect.php";
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    if (!empty($_POST['login'])) {
        $login = $_POST['login'];
        $input_password = $_POST['password'];
        $data = $DBH->prepare("SELECT `key`, `password` FROM `user` WHERE `login` LIKE ?");
        $data->execute([$login]);
        $result = $data->fetchAll();
        $c = $data->rowCount();
        if ($c != 0) {
            $id = $result[0]['key'];
            $password = $result[0]['password'];
            if (password_verify($input_password, $password)) {
                $_SESSION['user_id'] = $id;
                echo $_SESSION['user_id']."<br>".$password;
            } else {
                $_SESSION['msg_error'] = "Неверный пароль";
                echo "Неверный пароль";
            } //Неверный пароль
        } else {
            echo "Пользователь не существует";
            $_SESSION['msg_error'] = "Пользователь не существует";
        }//Пользователь не существует
    } else {
        echo "Некоректное имя пользователя";
    }
}
header("location: http://f0506120.xsph.ru/index.php");






