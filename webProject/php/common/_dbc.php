<?php

$host = "127.0.0.1:3308";
$user = "root";
$passwd = "oh0708";
$dbn = "orderlist"; // db 이름

try
{

    $db = new PDO('mysql:host='.$host.';dbname='.$dbn, $user, $passwd);

    // PDO 의 생성자생성 실패시 에러가 뜹니다. PDO 의 직접적인 에러가 뜬다면 php.ini 설정의 잘못

    // print_r($db);

    // PDO Object 가 출력되야 정상입니다.
}
catch (PDOException $e) {
    print $e->getMessage();
    die();
}
?>