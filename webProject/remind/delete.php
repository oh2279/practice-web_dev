<?php
    include_once "./inc/_head.php";

    $id = $_GET["id"];
    $page = $_GET['page'];
?>
<div class="container">

        <section class="col-10">

            <form action="deleteDo.php" method="POST" id="passwd_form">
                <div class="pass_title">
                    삭제를 위해 패스워드를 입력해주세요.
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
        </section>

</div>