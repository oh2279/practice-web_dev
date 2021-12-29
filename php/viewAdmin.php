<?php
	session_start();	//세션을 통한 보안 강화
    include_once "./common/_dbc.php";
    include_once "./common/_lib.php";
    include_once "./inc/_head.php";
	
	$lockId = htmlspecialchars($_SESSION["aliver"]);

    $id = htmlspecialchars($_GET["id"]);
	$page = htmlspecialchars($_GET["page"]);

    $vtmt = $db->prepare("UPDATE `userlist` SET view = view + 1 WHERE uid = :id");
    $vtmt->bindParam(":id", $id, PDO::PARAM_INT);
    $vtmt->execute();

    $stmt = $db->prepare("SELECT name, subject, contents, view, regdate, secure, class FROM `userlist` WHERE uid = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$secure = $row['secure'];
	/*if ((bool) $secure) {

        $checkId = "view".$id; // 비교용
        $lockIcon = "<i class='material-icons'>lock</i>"; // lock 아이콘 = 제목 앞에 붙여주면 됩니다.

        // empty($lockId) 는 session 이 없는 경우를 말합니다.
        if (empty($lockId) || $lockId != $checkId) {
            warn_back("질못된 접근입니다.");
        }
    }*/

    $name = $row['name'];
    $subject = $row['subject'];
    $contents = $row['contents'];
    $view = $row['view'];
    $regdate = $row['regdate'];
	$class = $row['class'];

    $contents = nl2br($contents); // 줄바꿈 처리

    $date = date_create($regdate);
    $_date = date_format($date, "Y년 m월 d일 H:i:s");
?>
<script>
function back(){
    history.go(-1);
}
</script>

<div class ="container" style=margin-top:100px>
			<a onclick ="back()" class="btn btn-secondary">뒤로가기</a>
            <div class="container_sub" style=text-align:center>
                제목 : <?=$subject?>
            </div>
		
            <div class="container_name">
                <span>
                    <i class="material-icons" style=text-align:left>person</i>
                    작성자 : <?=$name?>
                </span>
                <span class='right'>
                    <i class="material-icons" style=text-align:right>visibility</i>
                    <?=$view?>
                </span>
            </div>
			<div class="container" style=text-align:center>
                <?php
					if($class == "one"){
						echo "1. 핸드드립 타임 클래스(취미반)";
					}
					elseif($class == "two"){
						echo "2. 핸드드립 교육(기초반)";
					}
					else{
						echo "3. 커피머신 교육";
					}
				?>
            </div>
			
            <div class="container_main" style=text-align:center>
                <?=$contents?>
            </div>
			
            <div class="container_date" style=text-align:right>
                <span>
                    게시 날짜 : <i class="material-icons">date_range</i> 
                    <?=$_date?>
                </span>
            </div>
			<div class="bb_btns">
				<a href="./password.php?id=<?=$id?>&page=<?=$page?>&mode=modify" class='btn btn-secondary'>수정</a>
				<a href="./delete.php?id=<?=$id?>&page=<?=$page?>" class='btn btn-secondary'>삭제</a>
				<a onclick = "back()" class='btn btn-secondary'>목록</a>
			</div>

</div>

<?php
   include_once "./inc/_tail.php";
?>
