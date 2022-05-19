
const $ = (el, all) => all ? document.querySelectorAll(el) : document.querySelector(el);

const addClass = (el, cl) => el.classList.add(cl);
const removeClass = (el, cl) => el.classList.remove(cl);

const list = document.querySelector(".list");
const items = [...document.querySelectorAll(".list .item")];
const dBtns = [...document.querySelectorAll(".dir-btn")];
const nBtn = list.querySelector(".num-btns");
    
const length = items.length;
const pageLimit = 6;
let nowPage = 0;
let pageNum = 0;  // 현재 페이지의 십의 자리숫자;
const maxLimit = Math.ceil(length/pageLimit);

const render = (page) => {
    list.querySelector(".count").textContent = length;
    list.querySelector(".nowPage").textContent = page+1;
    list.querySelector(".maxPage").textContent = maxLimit;
    items.forEach(e => e.classList.add("none"));

    const startItem = pageLimit*page;
    for(let i = startItem; i<startItem+pageLimit; i++) {
        items[i]?.classList?.remove("none");
    }

    pageNum = Math.floor(nowPage/10);
    const startNum = pageNum*10;
    const endNum = startNum+10 >= maxLimit ? maxLimit : startNum+10;

    nBtn.innerHTML = ``;
    for(let i=startNum; i<endNum; i++) {
        const div = document.createElement("div");
        div.className = i === nowPage ? 'active' : '';
        div.innerText = i+1;
        nBtn.appendChild(div);
    }

    [...nBtn.children].forEach(e => e.addEventListener("click", function() {
        nowPage = this.textContent-1;
        render(nowPage);
    }));
};

render(nowPage);

dBtns.forEach( e => e.addEventListener( "click", function() {
    pageNum = Math.floor(nowPage/10);
    nowPage = this.classList.contains("prve") ? (pageNum-1)*10+9 : (pageNum+1)*10;
    nowPage = nowPage < 0 ? 0 :
    nowPage > maxLimit ? maxLimit-1 
    : nowPage;
    render(nowPage);
} ) )

items.map(e => {
    e.addEventListener("click",async function(){
        const item = await fetch(`/store/Page/${this.dataset.idx}`).then(res=> res.json());
        let form = document.update_form;
        $('.update_modal').classList.remove('none');
        form[0].value = item.name;
        [...$('.update_modal input[type="radio"]', true)].map($input => {if($input.value) $input.checked = true});
        form[1].value = item.type;
        form[5].value = item.phone;
        form[6].value = item.address;
        form[7].value = item.rm;
        $('.remove_btn').innerHTML = `
            <a href="/store/remove/${item.idx}">삭제</a>
            <input type="hidden" name="idx"value="${item.idx}">
        `
    });
});

$('.popup-btn').addEventListener("click", () => {
        removeClass($('.insert_modal'), 'none');
});

[...$('.close_btn', true)].map($btn => {
    $btn.addEventListener("click", (e) =>{
        [...$('.modal_wrap', true)].map($modal => addClass($modal, 'none'));
    });
});
