<?php include_once "./inc/_head.php"; ?>

<div class="container">
    <div class="content row">

        <?php include_once "./inc/_nav.php"; ?>

        <section class="col-10">
            <form action="writeDo.php" method="post">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">이름</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="이름을 작성해주세요." required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">수강 클래스</label>
                    <div class="col-sm-3">
                        <div class="dropdown">
							<select class="form-control" id = "class" name="class" required>
								<option value="one">1. 핸드드립 타임 클래스(취미반)</option>
								<option value="two">2. 핸드드립 교육(기초반)</option>
								<option value="three">3. 커피머신 교육</option>
							</select>
						</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">제목</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="제목을 작성해주세요." required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="contents" class="col-sm-2 col-form-label">내용</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="contents" name="contents" rows="6" placeholder="내용을 작성해주세요." required></textarea>
                    </div>
                </div>

                <!-- password 자리 -->
                <div class="form-group row">
                    <label for="passwd" class="col-sm-2 col-form-label">비밀번호</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="passwd" name="passwd" placeholder="비밀번호를 작성해주세요." required>
                        <div class="explain">
                            * 수정 및 삭제를 위해 반드시 필요합니다
                         </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="secure" id="secure">
                            <label class="custom-control-label" for="secure">비공개 설정</label>
                        </div>

                        <div style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">등록하기</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<?php 
include_once "./inc/_tail.php";
?>