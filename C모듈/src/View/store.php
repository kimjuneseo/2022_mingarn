<div class="insert_modal modal_wrap flex none">
        <form action="/store" class="modal flex" method="post" name="insert_form">
            <div class="top_menu flex">
                <h2 class="title">주변정보 관리</h2>
                <div class="close_btn exit">X</div>
            </div>
            <div class="flex item">
                <p class="sub_title">상호명</p>
                <input type="text" name="name" placeholder="상호명을 입력하세요.">
            </div>
            <div class=" item">
                <p class="sub_title">종류</p>
                <input type="radio" name="kind" id="name1" value="상가">
                <label for="name1">상가</label>
                <input type="radio" name="kind" id="name2" value="관광서">
                <label for="name2">관광서</label>
                <input type="radio" name="kind" id="name3" value="교육" check>
                <label for="name3">교육</label>
                <input type="radio" name="kind" id="name4" value="문화">
                <label for="name4">문화</label>

            </div>
            <div class="flex item">
                <p class="sub_title">연락처</p> 
                <input type="text" name="phone" placeholder="연락처를 입력하세요.">
            </div>
            <div class="flex item">
                <p class="sub_title">주소</p>
                <input type="text" name="address" placeholder="주소를 입력하세요.">
            </div>
            <div class="flex item">
                <p class="sub_title">설명</p>
                <textarea   placeholder="설명을 입력하세요." name="info"></textarea>
            </div>
            <div class="flex btn_Item">
                <div class="l_item">
                    <div class="btn">삭제</div>
                </div>
                <div class="r_item flex">
                    <div class="btn close_btn">닫기</div>
                    <button type="sumbit">저장</button>
                </div>

            </div>

        </form>
</div>

<div class="update_modal modal_wrap flex none">
        <form action="/store/update" class="modal flex" method="post" name="update_form">
            <div class="top_menu flex">
                <h2 class="title">주변정보 관리</h2>
                <div class="close_btn exit">X</div>
            </div>
            <div class="flex item">
                <p class="sub_title">상호명</p>
                <input type="text" name="name" placeholder="상호명을 입력하세요.">
            </div>
            <div class=" item">
                <p class="sub_title">종류</p>
                <input type="radio" name="kind" id="name1" value="상가">
                <label for="name1">상가</label>
                <input type="radio" name="kind" id="name2" value="관광서">
                <label for="name2">관광서</label>
                <input type="radio" name="kind" id="name3" value="교육">
                <label for="name3">교육</label>
                <input type="radio" name="kind" id="name4" value="문화">
                <label for="name4">문화</label>

            </div>
            <div class="flex item">
                <p class="sub_title">연락처</p>
                <input type="text" name="phone" placeholder="연락처를 입력하세요.">
            </div>
            <div class="flex item">
                <p class="sub_title">주소</p>
                <input type="text" name="address" placeholder="주소를 입력하세요.">
            </div>
            <div class="flex item">
                <p class="sub_title">설명</p>
                <textarea   placeholder="설명을 입력하세요." name="info"></textarea>
            </div>
            <div class="flex btn_Item">
                <div class="l_item">
                    <div class="btn remove_btn">삭제</div>
                </div>
                <div class="r_item flex">
                    <div class="close_btn btn">닫기</div>
                    <button type="sumbit">저장</button>
                </div>

            </div>

        </form>
</div>

<div class="container">
    <div class="list">
        <div class="top_info flex">
            <h2>주변정보-관공서</h2>
            <p>아파트 주변정보를 확인하세요.</p>
        </div>
        <div class="title flex">

            <h3 class="page-info flex">
                총 <span class="count"></span>건 <span class="nowPage"></span>p/<span class="maxPage"></span>p
            </h3>
            <button class="popup-btn" >등록</button>
        </div>
        <div class="list-container grid">
            <?php foreach($items as $item) :?>
            <div class="item flex" data-idx="<?=$item->idx?>">
                <div class="photo flex">
                    <h3><?=$item->type ?></h3>
                    <h3><?=$item->name ?></h3>
                </div>
                <div class="text">
                    <div class="title">
                        <p><?=$item->address ?></p>
                    </div>
                    <div class="content"><?=$item->rm ?></div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="page-nation flex">
            <button class="dir-btn prve">
                <<</button> <div class="num-btns flex">

        </div>
        <button class="dir-btn next">>></button>
    </div>
</div>