<?php
include_once "./common/_dbc.php";
include_once "./common/_lib.php";

$del_passwd = htmlspecialchars($_POST['del_passwd']);
$id = htmlspecialchars($_POST["id"]);
$page = htmlspecialchars($_POST["page"]);

try {

    $ptmt = $db->prepare("SELECT COUNT(*) as rt FROM `userlist` WHERE passwd = PASSWORD(:del_passwd) AND uid = :id");
    $ptmt->bindParam(":del_passwd", $del_passwd, PDO::PARAM_STR);
    $ptmt->bindParam(":id", $id, PDO::PARAM_INT);
    $ptmt->execute();
    $row = $ptmt->fetch(PDO::FETCH_ASSOC);
    $rt = $row['rt'];

    if ($rt == 0) { warn_back("비밀번호가 틀립니다."); }

    $dtmt = $db->prepare("DELETE FROM `userlist` WHERE uid = :id");
    $dtmt->bindParam(":id", $id, PDO::PARAM_INT);
    $result = $dtmt->execute();

    if ($result) {
        _goto("/php/?page=".$page);
    } else {
        print_r($db->errorInfo());
    }

} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
?>