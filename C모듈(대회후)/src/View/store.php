<div class="popupwrap insert_form none">
    <div class="popup flex">
        <form action="/insert" method="post" class="flex">
            <div class="top_item flex">
                <h2>주변정보 관리</h2>
                <p class="close_btn">X</p>
            </div>
            <div class="item flex">
                <p>상호명</p>
                <input type="text" name="name" placeholder="상호명을 입력해주세요.">
            </div>
            <div class="item flex">
                <p>종류</p>
                <div class="input_item flex">
                    <input value="상가" name="type1" id="type1" type="radio">
                    <label for="type1">상가</label>
                    <input value="관공서" name="type1" id="type2" type="radio">
                    <label for="type2">관공서</label>
                    <input value="교육" name="type1" id="type3" type="radio">
                    <label for="type3">교육</label>
                    <input value="문화" name="type1" id="type4" type="radio">
                    <label for="type4">문화</label>
                </div>
            </div>
            <div class="item flex">
                <p>연락처</p>
                <input name="phone" type="text" placeholder="연락처를 입력해주세요.">
            </div>
            <div class="item flex">
                <p>주소</p>
                <input name="add" type="text" placeholder="주소를 입력해주세요.">
            </div>
            <div class="item flex">
                <p>설명</p>
                <textarea name="nm" type="text" placeholder="설명을 입력해주세요."></textarea>
            </div>
            <div class="btn_item flex">
                <button class="close_btn" type="button">닫기</button>
                <button type="submit">저장</button>
            </div>
        </form>
    </div>
</div>
<div class="popupwrap update_wrap none">
    <div class="popup flex">
        <form action="/store/update" method="post" class="flex" name="update_form">
            <input type="hidden" name="idx">
            <div class="top_item flex">
                <h2>주변정보 관라</h2>
                <p class="close_btn">X</p>
            </div>
            <div class="item flex">
                <p>상호명</p>
                <input name="name" type="text" placeholder="상호명을 입력해주세요.">
            </div>
            <div class="item flex">
                <p>종류</p>
                <div class="input_item flex">
                    <input value="상가" name="type2" id="type21" type="radio">
                    <label for="type21">상가</label>
                    <input value="관공서" name="type2" id="type22" type="radio">
                    <label for="type22">관공서</label>
                    <input value="교육" name="type2" id="type23" type="radio">
                    <label for="type23">교육</label>
                    <input value="문화" name="type2" id="type24" type="radio">
                    <label for="type24">문화</label>
                </div>
            </div>
            <div class="item flex">
                <p>연락처</p>
                <input name="phone" type="text" placeholder="연락처을 입력해주세요.">
            </div>
            <div class="item flex">
                <p>주소</p>
                <input name="add" type="text" placeholder="주소을 입력해주세요.">
            </div>
            <div class="item flex">
                <p>설명</p>
                <input name="nm" type="text" placeholder="설명을 입력해주세요.">
            </div>
            <div class="item flex">
                <!-- <div class="l_item"> -->
                <!-- <button type="button">삭제</button> -->
                <!-- </div> -->
                <div class="r_item">
                    <button class="close_btn" type="button">닫기</button>
                    <button type="submit">저장</button>
                </div>
            </div>
    </div>
    </form>
</div>
<main id="storePage"></main>
<section id="store">
    <div class="container">
        <p class="nabe">HOME > 주변정보 > 관공서</p>
        <h2 class="title">관공서</h2>
        <div class="info flex ">
            <div class="r_item flex">
                <p>총</p>
                <p>
                    <p class="num"></p>건
                </p>
                <p>
                    <p class="nowPage"></p>p
                </p>
                <p>/</p>
                <p>
                    <p class="maxPage"></p>p
                </p>
            </div>
            <div class="l_item">
                <button class="addBtn">등록</button>
            </div>
        </div>
        <div class="store grid">
            <?php foreach($item as $data) :?>
            <div data-idx="<?=$data->idx?>" class="item grid">
                <div class="l_item flex">
                    <h2><?=$data->type?></h2>
                </div>
                <div class="r_item grid">
                    <div class="top flex">
                        <h2 class="r_name"><?=$data->name?></h2>
                        <div><?=$data->adress?></div>
                    </div>
                    <div><?=$data->rm?></div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="pageing flex">
            <button data-y="0">
                <<</button> <div class="n_btn flex">

        </div>
        <button data-y="1">>></button>
    </div>
    </div>
    </div>
</section>