<?php
    include_once "./common/_dbc.php";
    include_once "./common/_lib.php";

    $bb_passwd = htmlspecialchars($_POST["bb_passwd"]);

    if (empty($bb_passwd)) { warn_back("비밀번호를 작성해주세요."); }
   
    // 패스워드 비교
    if ($bb_passwd != "admin") {
        warn_back("비밀번호가 일치하지 않습니다.");
    }

    _goto("./".$bb_passwd.".php?page=".$page."&id=".$id)
?>