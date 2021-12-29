<?php
    session_start(); // session 시작 선언
    include_once "./common/_dbc.php";
    include_once "./common/_lib.php";
    include_once "./inc/_head.php";

    $page = htmlspecialchars($_POST['page']);
    $id = htmlspecialchars($_POST['id']);
    $mode = htmlspecialchars($_POST["mode"]);
    $bb_passwd = htmlspecialchars($_POST["bb_passwd"]);

    if (empty($bb_passwd)) { warn_back("비밀번호를 작성해주세요."); }

    // 패스워드 암호화
    $stmt = $db->prepare("SELECT PASSWORD(:bb_passwd)");
    $stmt->bindParam(":bb_passwd", $bb_passwd, PDO::PARAM_STR);
    $stmt->execute();
    $pass = $stmt->fetch();
    
    // 기존 패스워드 가져오기
    $btmt = $db->prepare("SELECT passwd FROM `userlist` WHERE uid = :id");
    $btmt->bindParam(":id", $id, PDO::PARAM_INT);
    $btmt->execute();
    $pass_origin = $btmt->fetch(PDO::FETCH_ASSOC);
   
    // 패스워드 비교
    if ($pass[0] != $pass_origin["passwd"]) {
        warn_back("비밀번호가 일치하지 않습니다.");
    }

    $cook = $mode.$id;
    $_SESSION["aliver"] = $cook;

    // _lib.php 에 있는 _goto 메서드 사용 :: view 또는 modify 로 이동
    _goto("./".$mode.".php?page=".$page."&id=".$id)
?>