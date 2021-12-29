<?php
    include_once "./inc/_head.php";

    $id = htmlspecialchars($_GET["id"]);
    $page = htmlspecialchars($_GET['page']);
?>
<br>
<div class="container">
    <div class="content row">
        <div class="col-10">

            <form action="deleteDo.php" method="POST" id="passwd_form">
            <div class="pass_title">
					<h2>삭제하기</h2>
					<br>
                    작성하실 때 설정한 비밀번호를 입력해주세요.
                </div>

                <div class="pass_input">
                    <input type="password" name="del_passwd" required />
                    <input type="hidden" name="id" value="<?=$id?>" />
                    <input type="hidden" name="page" value="<?=$page?>" />
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">확인</button>
                    <button type="button" class="btn btn-secondary" onClick="history.back(-1);">뒤로가기</button>
                </div>

            </form>
        </div>
    </div>
</div>