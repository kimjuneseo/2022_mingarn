<main id="votingPage"></main>
<div class="popupwrap">
    <div class="popup flex">
        <form action="/voting" method="post" class="flex">
            <div class="top_item flex">
                <p>선거/투표 관리</p>
                <p>X</p>
            </div>
            <div class="item flex">
                <p>선거/투표명</p>
                <input type="text" placeholder="선거/투표명을 입력하세요.">
            </div>
            <div class="item flex">
                <p>선거/투표 기간</p>
                <div class="input_box flex">
                    <input type="date" name="first_date">~
                    <input type="date" name="end_date">

                </div>
            </div>
            <div class="item flex">
                <p>투표대상</p>
                <div class="input_box flex">
                    <input type="text" name="all_user" placeholder="투표대상 인원을 입력하세요."> 명
                </div>
            </div>
            <div class="item flex">
                <div class="item_header flex">
                    <p>안건</p>
                    <div class="flex input_add_btn">추가</div>
                </div>
                <div class="input_container flex">
                    <input type="text" placeholder="안건1" name="item[]">
                    <input type="text" placeholder="안건1" name="item[]">
                </div>
            </div>
            <div class="btn_item flex">
                <button type="button" class="item_remove_btn">삭제</button>
                <div class="btns flex">
                    <button type="button" class="close_btn">닫기</button>
                    <button type="submit" class="submit_btn">저장</button>

                </div>
            </div>
        </form>
    </div>
</div>
</div>
<section id="voting">
    <div class="container">
        <p class="nabe">HOME > 선거/투표</p>
        <h2 class="title">선거/투표</h2>
        <div class="addBtn">
            <p>등록</p>
        </div>
        <div class="voting_container">
            <div class="voting_template header">
                <div class="item">순번</div>
                <div class="item">선거/투표명</div>
                <div class="item">기간</div>
                <div class="item">투표대상</div>
                <div class="item">투표인원</div>
                <div class="item">투표율</div>
                <div class="item">투표 및 결과</div>
            </div>
            <div class="voting_template voting_item">
                <div class="item">1</div>
                <div class="item">선거관리위원 해촉 및 관리비 횡령 관련 민/형사 고발 안건 투표</div>
                <div class="item">22.04.04 ~ 22.05.01</div>
                <div class="item">222명</div>
                <div class="item">222명</div>
                <div class="item">59%</div>
                <div class="item"></div>
            </div>

        </div>
</section>