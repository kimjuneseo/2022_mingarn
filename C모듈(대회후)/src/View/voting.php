<main id="votingPage"></main>
<div class="none popupwrap">
    <div class="popup flex">
        <form action="/voting/insert" method="post" class="flex popup_form">
            <div class="top_item flex">
                <p>선거/투표 관리</p>
                <button class="close_btn" type="button">X</button>
            </div>
            <div class="item flex">
                <p>선거/투표명</p>
                <input type="text" name="voting" placeholder="선거/투표명을 입력하세요.">
            </div>
            <div class="item flex">
                <p>선거/투표 기간</p>
                <div class="input_box flex">
                    <input type="date" name="start_date">~
                    <input type="date" name="end_date">

                </div>
            </div>
            <div class="item flex">
                <p>투표대상</p>
                <div class="input_box flex">
                    <input type="number" name="all_user" placeholder="투표대상 인원을 입력하세요."> 명
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
<div class="popupwrap voting_modal none">
    <div class="popup flex">
        <div class="popup_form flex">
            <input type="radio" id="voting1" name="voting" checked>
            <input type="radio" id="voting2" name="voting">
            <input type="radio" id="voting3" name="voting">
            <div class="top_item flex">
                <p>투표하기</p>
                <button class="close_btn" type="button">X</button>
            </div>
            <div class="label_item flex">
                <label for="voting1" class="voting_label1">1. 동/호수 인증</label>
                <label for="voting2" class="voting_label2">2. 투표하기</label>
                <label for="voting3" class="voting_label3">3. 투표결과 </label>
            </div>

            <div class="tap_item flex none">
                <div class="item flex">
                    <p>선거/투표명</p>
                    <input type="text" name="voting_name">
                </div>
                <div class="item flex">
                    <p>동/호수</p>
                    <div class="input_container flex">
                        <input type="text" placeholder="동">동
                        <input type="text" placeholder="호수">호수
                    </div>
                </div>
                <div class="btn_item flex">
                    <div class="btns flex">
                        <button type="button" class="close_btn">닫기</button>
                        <button type="button" class="next_tab_btn">다음</button>

                    </div>
                </div>
            </div>
            
            <form method="post" name="voting_form" action="/voting/voting" class="tap_item flex none">
                <div class="item flex">
                    <p>선거/투표명</p>
                    <input type="text" name="voting_name">
                </div>
                <div class="item flex">
                    <p>동/호수</p>
                    <div class="input_container flex">
                        <input type="text" placeholder="동">동
                        <input type="text" placeholder="호수">호수
                    </div>
                </div>
                <div class="voting_lsit flex">
                    <p>안건</p>
                    <div class="votings">
                        
                    </div>
                </div>

                <div class="btn_item flex">
                    <div class="btns flex">
                        <button type="button" class="close_btn">닫기</button>
                        <button type="button" class="complate_btn">완료</button>

                    </div>
                </div>
            </form>

            <form action="/voting/insert" method="post" class="flex">
            </form>


        </div>
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
            <?php for($i = 1; $i <= count($list); $i++):?>
            <div class="voting_template voting_item" data-idx="<?=$list[$i-1]->idx?>">
                <div class="item"><?=$i?></div>
                <div class="item"><?=$list[$i-1]->name?></div>
                <div class="item"><?=$list[$i-1]->start_date?> ~ <?=$list[$i-1]->end_date?></div>
                <div class="item"><?=$list[$i-1]->all_user?>명</div>
                <div class="item"><?=$list[$i-1]->all_voting?>명</div>
                <div class="item"><?=$list[$i-1]->all_voting/$list[$i-1]->all_user * 100?>%</div>
                <?php if($list[$i-1]->all_voting/$list[$i-1]->all_user * 100 == 100):?>
                <div>결과보기</div>
                <?php else:?>
                <div class="flex">
                    <button class="api_btn add_voting" type="button">투표하기</button>
                    <button class="api_btn result_voting" type="button">결과보기</button>
                </div>

                <?php endif;?>


            </div>
            <?php endfor;?>

        </div>
</section>