<?php
	include_once "./inc/_head.php";
    include_once "./common/_dbc.php" ;
    include_once "page.php";
?>

<div class="container" style = text-align:center>
        <h2 style="font-family: 'Gowun Batang', serif;"><strong>교육신청란</strong></h2>
		<img src="../images/커피교육.jpg" alt = "커피교육">
        <p style="font-family: 'Gowun Batang', serif;">커피를 배우고픈 당신 <br> <br>자유롭게 글을 남겨주세요 <br> 연락처와 배우고픈 것을 함께 남겨주시면 더욱 좋습니다<br><br>
		
		</p>
		
</div>

<div class="container">

            <div class="link-zone">
                <button style = "float:right;"><a href='./write.php' class="btn btn-outline-secondary btn-sm right" id="btn-write">글쓰기</a></button>
                <button style = "float:left;"><a href='./adminCheck.php' class="btn btn-outline-secondary btn-sm right" id="btn-write">사장님만!</a></button>
            </div>
		
            <table class="table table-striped">
                <thead>
                <tr>
                    <th >번호</th>
                    <th >제목</th>
                    <th >이름</th>
                    <th >등록일</th>
                    <th >조회수</th>
                </tr>
                </thead>
                <?php

                    $stmt = $db->prepare("SELECT uid, subject, name, secure, view, regdate FROM `userlist` WHERE depth = 0 ORDER BY uid DESC LIMIT $start , $listSize");
                    $stmt->execute();

                    foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row ) {
                        $uid = $row['uid'];
                        $subject = $row['subject'];
                        $name = $row['name'];
                        $secure = $row['secure'];
                        $view = $row['view'];
                        $regdate = $row['regdate'];

                        $date = date_create($regdate);
                        $_date = date_format($date, "Y-m-d");

                        if ((bool) $secure) {
                            $subject_link = "<a href='password.php?page=".$page."&id=".$uid."&mode=view'>".$subject." <i class='material-icons'>lock</i> </a>";
                        } else {
                           $subject_link = "<a href='view.php?page=".$page."&id=".$uid."'>".$subject."</a>";

                        }
                       
                        echo ("
                        <tbody>
                            <tr>
                                <th >".$no."</th>
                                <th >".$subject_link."</th>
                                <th >".$name."</th>
                                <th >".$_date."</th>
                                <th >".$view."</th>
                            </tr>
                        </tbody>
                        ");
                        $no--;
                    }
                ?>
				</table>
				<div class="paging">
					<ul class="pagination justify-content-center">
						<?php
							echo "<li class='page-item'>".$prevBlock."</li>";
							for ($i = $startPage; $i <= $endPage; $i++) {
								$active = $page == $i ? "disabled" : "";
								echo "<li class='page-item'><a class='page-link ".$active."' href='./?page=".$i."'>".$i."</a></li>";
							}
							echo "<li class='page-item'>".$nextBlock."</li>";
						?>
					</ul>

			</div>
		
</div>

<?php 
include_once "./inc/_tail.php";?>