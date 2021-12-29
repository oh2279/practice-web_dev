<?php
include_once "./common/_dbc.php";
include_once "./common/_lib.php";

$subject = htmlspecialchars($_POST['subject']);
$contents = htmlspecialchars($_POST['contents']);
$name = htmlspecialchars($_POST['name']);
$secure = htmlspecialchars($_POST['secure']);
$passwd = htmlspecialchars($_POST['passwd']);
$class = htmlspecialchars($_POST['class']);

if (empty($subject)) { warn_back("제목을 작성해 주세요."); }
if (empty($contents)) { warn_back("내용을 작성해 주세요."); }
if (empty($name)) { warn_back("이름을 작성해 주세요."); }
if (empty($passwd)) { warn_back("비밀번호를 작성해 주세요."); }

$isSecure = empty($secure) ? 0 : 1;
$regdate = date("Y-m-d H:i:s", time());

try {

    $ptmt = $db->prepare("SELECT PASSWORD(:passwd) as pw");
    $ptmt->bindParam(":passwd", $passwd, PDO::PARAM_INT);
    $ptmt->execute();
    $isPasswd = $ptmt->fetch(PDO::FETCH_ASSOC);
    $isPasswd = $isPasswd['pw'];

    $stmt = $db->prepare("INSERT INTO `userlist`(subject, contents, passwd, secure, name, regdate, class) VALUES(:subject, :contents, :isPasswd, :isSecure, :name, :regdate, :class)");
    $stmt->bindParam(":subject", $subject, PDO::PARAM_STR);
    $stmt->bindParam(":contents", $contents, PDO::PARAM_STR);
    $stmt->bindParam(":isPasswd", $isPasswd, PDO::PARAM_STR);
    $stmt->bindParam(":isSecure", $isSecure, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":regdate", $regdate, PDO::PARAM_STR);
	$stmt->bindParam(":class", $class, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        _goto("/php");
    } else {
        print_r($db->errorInfo());
    }

} catch (PDOException $e) {
    print $e->getMessage();
    die();
}

?>

