<section>
    <div class="container">
        <div class="top_info flex">
            <h2>주변정보 - 관공서</h2>
            <p>아파트 주변정보를 확인하세요.</p>
        </div>
        <div class="flex pageInfo">
            <div class="flex">
                <h2>총 <?=$cnt?>건</h2>
                <h2><?=$page?>p/</h2>
                <h2><?=$AllPageCnt?>p</h2>
            </div>
            <div class="addBtn">
                <div class="btn flex">등록</div>
            </div>
        </div>
        <div class="contetns grid">
            <?php foreach($items as $item): ?>
            <div class="item">
                <div class="flex content">
                    <div class="right">
                        <div><?=$item->type?></div>

                    </div>

                    <div>
                        <div class="top_item flex">
                            <h2><?=$item->name?></h2>
                            <div><?=$item->address?></div>
                        </div>
                        <div><?=$item->rm?></div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="pageN flex">
            <div class="item"><a href="/store/prev">
                    <<</a> </div> <?php for($i = 1; $i <= $AllPageCnt; $i++):?> <div class="item"><a
                            href="/store/<?=$i?>"><?=$i?></a></div>
            <?php endfor;?>
            <div class="item"><a href="/store/next">>></a></div>
        </div>
    </div>
</section>