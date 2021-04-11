<?php
include "db_connect.php";
session_start();
$id_user = 0;
$role = "user";
if (isset($_GET['logout'])) {
    session_unset();
    header("location: http://f0506120.xsph.ru/index.php");
}

$name_category = "";
$is_login = false;

if (isset($_POST['SelectFile']) && isset($_POST['TextImg']) && isset($_POST['categoryImg'])) {
    $data = $DBH->query("SELECT COUNT (`key`) AS `c` FROM `photos` WHERE `id_cat_name`=?");
    $data->execute([$_POST['categoryImg']]);
    $result = $data->fetchAll();
    if ( $result[0]["c"] > 9) {
        $new_name_jpg = ($result[0]["c"] + 1).".".pathinfo($_POST['SelectFile'])['extension'];
    } else {
        $new_name_jpg = ($result[0]["c"] + 1).".".pathinfo($_POST['SelectFile'])['extension'];
        $new_name_jpg = "0".$new_name_jpg;
    }

}

if (isset($_SESSION['user_id'])) {
    $is_login = true;
    $id_user = $_SESSION['user_id'];
    $data = $DBH->prepare("SELECT `role` FROM `user` WHERE `key` = ?");
    $data->execute([$id_user]);
    $result = $data->fetchAll();
    $role = $result[0]["role"];
}

if (isset($_SESSION['msg_error'])) {
    $msg_error = $_SESSION['msg_error'];
    unset($_SESSION['msg_error']);
}

try {

$category = "";
if (isset($_GET["category"])) {
    echo $_GET["category"];
    $data = $DBH->query("SELECT `key` FROM `categories` WHERE `category`='". $_GET["category"]."'");
    $data->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $data->fetch()) {
        $category = $row["key"];
    }
    $name_category = "category=".$_GET["category"];
}else {
        $category = "1";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_GET["u"]) && isset($_GET["i"]) && (isset($_GET["l"]) || isset($_GET["d"]))) {
    $id_photo = $_GET["i"];
    if (isset($_GET["l"])) {
        $l = 1;
    } else {
        $l = -1;
    }
    $data = $DBH->prepare("SELECT l FROM `like` WHERE (`id_user` = ?) AND (`id_photo` = ?)");
    $data->execute([$id_user, $id_photo]);
    $result = $data->fetchAll();
    $c = $data->rowCount();
    if ($c == 0) {
        $data = $DBH->prepare("INSERT INTO `like` (`key`, `id_user`, `id_photo`, `l`) VALUES (NULL, ?, ?, ?)");
        $data->execute([$id_user, $id_photo, $l]);
    } else {
        $l_db = $result[0]["l"];
        if ($l==$l_db) {
            $data = $DBH->prepare("DELETE FROM `like`  WHERE (`id_user` = ?) AND (`id_photo` = ?)");
            $data->execute([$id_user, $id_photo]);
        } else {
            $data = $DBH->prepare("UPDATE `like` SET `l`=? WHERE (`id_user` = ?) AND (`id_photo` = ?)");
            $data->execute([$l, $id_user, $id_photo]);
        }
    }
    if (isset($_GET["category"])) {
        header("location: http://f0506120.xsph.ru/index.php?".$name_category."#f".$id_photo);
    } else {
        header("location: http://f0506120.xsph.ru/index.php#f".$id_photo);
    }
}

if (isset($_POST["check-theme-cat"])) {
    $data = $DBH->prepare("SELECT COUNT(`theme`) AS `c` FROM `colors` WHERE (`id_user` = ?) AND (`id_page` = ?)");
    $data->execute([$id_user, $category]);
    $result = $data->fetchAll();
    $c = $result[0]["c"];
    if ($c == 0) {

    } else {
        
    }
}
if (isset($_POST["id_photo"]) && isset($_POST["status"])) {
    $status_img = 0;
if ($_POST["status"] == "true"){
    $status_img = 1;
}
    $data = $DBH->prepare("UPDATE `photos` SET `public`=? WHERE `key` = ?");
    $data->execute([$status_img, $_POST["id_photo"]]);
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="Icon/cat_icon.jpg" sizes="any" type="image/png">
    <title>
        <?php
        if ($category == 1) {
            echo "Котейки";
        } elseif ($category == 3) {
            echo "Хомяки";
        } elseif ($category == 5) {
            echo "Драконы";
        }
        ?>
    </title>
</head>
<body class="bg-dark"  id="Cat">
<!--<div class="fixed-top b-page_newyear">
    <div class="b-page__content">
        <i class="b-head-decor">
            <i class="b-head-decor__inner b-head-decor__inner_n1">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="0"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="7"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="8"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n2">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="9"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="10"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="11"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="12"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="13"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="14"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="15"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="16"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="17"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n3">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="18"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="19"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="20"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="21"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="22"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="23"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="24"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="25"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="26"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n4">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="27"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="28"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="29"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="30"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="31"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="32"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="33"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="34"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="35"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n5">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="0"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="7"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="8"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n6">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="9"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="10"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="11"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="12"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="13"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="14"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="15"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="16"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="17"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
            <i class="b-head-decor__inner b-head-decor__inner_n7">
                <div class="b-ball b-ball_n1 b-ball_bounce" data-note="18"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n2 b-ball_bounce" data-note="19"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n3 b-ball_bounce" data-note="20"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n4 b-ball_bounce" data-note="21"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n5 b-ball_bounce" data-note="22"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n6 b-ball_bounce" data-note="23"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n7 b-ball_bounce" data-note="24"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n8 b-ball_bounce" data-note="25"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_n9 b-ball_bounce" data-note="26"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
                <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            </i>
        </i>
    </div>
</div>-->
<nav class="navbar navbar-light fixed-top">
    <a class="navbar-brand text-light" href="index.php">
        <i class="fas fa-images"></i>
Фотогалерея
    </a>
    <div class="justify-content-end">
        <a class="navbar-brand text-light" href="index.php">
    Котейки
        </a>
        <a class="navbar-brand text-light" href="index.php?category=homka">
    Хомяки
        </a>
        <a class="navbar-brand text-light" href="index.php?category=dragon">
    Драконы
        </a>
        <?php
        if ($is_login) {
            echo'<div class="btn-group">';
            echo'<button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            echo '<i class="fas fa-user-friends"></i>';
            echo '</button>';
            echo '<div class="dropdown-menu dropdown-menu-lg-right">';
            echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalWindowPhoto"><i class="fas fa-images"></i></i> Загрузить фото</a>';
            echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalWindow"><i class="fas fa-cogs"></i></i> Настройки сайта</a>';
            echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalWindowInfo"><i class="fas fa-indent"></i></i> Информация о сайте</a>';
            echo '<a class="dropdown-item" href="?logout"><i class="fas fa-sign-out-alt"></i> Выход</a>';
            echo '</div>';
            echo '</div>';
        } else {
          echo  '<a class="navbar-brand text-light" href="#" data-toggle="modal" data-target="#ModalWindowLogin"><i class="fas fa-door-open"></i></a>';
        }
        ?>
    </div>
</nav>
    <!-- echo '<i class="fas fa-cogs"></i></a>'; -->
<div class="container">
    <h1 class="text-center text-light">
      <?php
      if ($category ==1) {
          echo "Котейки";
      } elseif ($category ==3) {
          echo "Хомяки";
      } elseif ($category ==5) {
          echo "Драконы";
      }
      ?>
       </h1>
    <div class="row">
    <!-- <div class="row row-cols-3"> -->

<?php
try {
    $data = "";
    if ($role == "admin") {
        $data = $DBH->query("SELECT `key`, `name`, `disc`, `public` FROM photos WHERE id_cat_name=".$category);
        $data->setFetchMode(PDO::FETCH_ASSOC);
    } elseif ($role == "user") {
        $data = $DBH->query("SELECT `key`, `name`, `disc` FROM photos WHERE (id_cat_name=".$category.") AND (`public`=1)");
        $data->setFetchMode(PDO::FETCH_ASSOC);
    }

    $i = 1;
    while ($row = $data->fetch()) {
        if (($i % 3) == 1) {
            echo '<div class="card-deck">';
        }

        $d= $DBH->prepare("SELECT l FROM `like` WHERE (`id_user` = ?) AND (`id_photo` = ?)");
        $d->execute([$id_user, $row['key']]);
        $r = $d->fetchAll();
        $c = $d->rowCount();
        if ($c == 0) {
            $icon_l = '<i class="far fa-thumbs-up"></i>';
            $icon_d = '<i class="far fa-thumbs-down"></i>';
        } else {
            if ($r[0]["l"] == 1) {
                $icon_l = '<i class="fas fa-thumbs-up"></i>';
                $icon_d = '<i class="far fa-thumbs-down"></i>';
            } else {
                $icon_l = '<i class="far fa-thumbs-up"></i>';
                $icon_d = '<i class="fas fa-thumbs-down"></i>';
            }
        }

        //echo '<div class="col mb-4">';
        echo '<div class="card text-center  h-100 my-border shadow-lg-cat bg-white rounded" id="f'.$row['key'].'">';
        echo '<div class="card-body">';
        if ($role == "admin") {
            echo '<div class="box-img">';
            echo '<div class="check-public">';
            echo '<form action="/" name="f'.$row['key'].'">';
            echo '<input type="checkbox" id="c'.$row['key'].'" name="n'.$row['key'].'"';
            if ($row['public'] == 1){
                echo ' checked';
            }
            echo '>';
            echo '</form>';
            echo '</div>';
        }
        echo '<a href="img/'.$row['name'].'" data-toggle="lightbox" data-title="Котейки" data-footer="'.$row['disc'].'">';
        echo '<img src="img/'.$row['name'].'" class="card-img-top" alt="...">';
        echo '<p class="card-text">'.$row['disc'].'</p>';
        if ($role == "admin") {
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="card-footer">';

        if ($is_login) {
            echo '<a class="text-primary like" href="?u='.$id_user.'&i='.$row['key'].'&l&'.$name_category.'">';
            echo $icon_l;
            echo '</a>';
        } else {
            echo '<i class="far fa-thumbs-up text-primary "></i>';
        }
        $summ_res= $DBH->prepare("SELECT SUM(l) AS `summ_like` FROM `like` WHERE (`id_photo` = ?)");
        $summ_res->execute([$row['key']]);
        $summ_like = $summ_res->fetchAll();
        if (isset($summ_like[0]["summ_like"])) {
            echo ' '.$summ_like[0]["summ_like"].' ';
        } else {
            echo ' 0 ';
        }

        if ($is_login) {
            echo '<a class="text-danger dislike" href="?u='.$id_user.'&i='.$row['key'].'&d&'.$name_category.'">';
            echo $icon_d;
            echo '</a>';
        }
        echo '</div>';
        echo '</div>';
        //echo '</div>';
        if (($i % 3) == 0) {
            echo '</div>';
        }
        $i++;
    }
    if (($i % 3) != 1) {
        echo '</div>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

    </div>
</div>
<footer class="navbar navbar-dark fixed-bottom">
    <a class="navbar-brand text-light justify-content-start">
        <i class="fas fa-user-alt"></i>
        Маилов Фариз
    </a>
    <div class="justify-content-space-between">
        <a class="navbar-brand text-light" id="P1">
            <i class="far fa-thumbs-up"></i>
            <a class="navbar-brand text-light">
                Спасибо!
            </a>
        </a>
    </div>
</footer>
<div class="modal fade" id="ModalWindow" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Дизайн</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group colorItemsCat">
                            <label for="colorItemsCat">Цвет элементов<sup class="text-danger">*</sup></label>
                            <input type="range" min="0" max="10" step="1" value="5" class="form-control-range" id="colorItemsCat">
                            <div class="squareItemCat"></div>
                        </div>
                    </form>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="check-theme-cat">
                        <label class="custom-control-label" for="check-theme-cat">Тёмная тема<sup class="text-danger">*</sup></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalWindowPhoto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Загрузка фотографий</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="ml-2">Загрузка<sup class="text-danger">*</sup></label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="SelectFile" required name="SelectFile" accept=".jpg,.jpeg,.png">
                    </div>
                    <label class="ml-2">Описание к картинке<sup class="text-danger">*</sup></label>
                    <div class="input-group">
                        <textarea class="form-control" id="TextImg" required name="TextImg""></textarea>
                    </div>
                    <div>
                        <select class="form-select form-select-sm" id="categoryImg" name="categoryImg" aria-label="Категория изображения">
                        <option selected>Выберите категорию...</option>
                        <option value="1">Котейки</option>
                        <option value="3">Хомяки</option>
                        <option value="5">Драконы</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary" id="upload_file">Загрузить</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalWindowInfo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--<form action="index.php" method="post">-->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Информация для Вас!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-friends"></i>
                            My button
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-images"></i></i> Загрузить фото</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i></i> Настройки сайта</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-indent"></i></i> Информация о сайте</a>
                        </div>
                    </div>
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
                        <h4 id="fat">Знакомнство<sup class="text-danger">*</sup></h4>
                        <p>Привет! Ты находишься на сайте, который предназначен для просмотра милых и вдвойне милых картинок! Котики, хомяки, дракончики, меня преполняет счастьем! Но на этом сайте ты не только можешь смотреть на картинки, НО и сам их дабавлять( если они достаточно милые), менять сам стиль сайта, покрасив его в другой цвет. Но я расскажу всё по порядку, так что, пожалуйста, дочитай его до конца. </p>
                        <h4 id="mdo">@mdo<sup class="text-danger">*</sup></h4>
                        <p>...</p>
                        <h4 id="one">один<sup class="text-danger">*</sup></h4>
                        <p>...</p>
                        <h4 id="two">два<sup class="text-danger">*</sup></h4>
                        <p>...</p>
                        <h4 id="three">три<sup class="text-danger">*</sup></h4>
                        <p>...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>
<div class="modal fade" id="ModalWindowLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход в личный кабинет<sup class="text-danger">*</sup></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($msg_error)) {
                    echo '<span class="text-danger error">';
                    echo $msg_error;
                    echo '</span>';
                }
                    ?>
                <form action="login.php" method="post">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Имя пользователя" aria-label="Имя пользователя" aria-describedby="addon-wrapping" required name="login">
                    </div>
                    <div class="p-1"></div>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="text"  class="form-control" placeholder="Пароль" aria-label="Пароль" aria-describedby="addon-wrapping" required name="password">
                    </div>
                    <button type="submit" class="btn btn-outline-primary m-2">Войти</button> или <a href="registration.php">Зарегистрироватся</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.5.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>
