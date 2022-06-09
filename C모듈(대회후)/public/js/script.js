const $ = (el, all) => all ? document.querySelectorAll(el) : document.querySelector(el);
const get = async (url) => {
    const data = await fetch(url, {}).then(res => res.json());

    return data;
}
{
    
    let page = document.querySelector('main').id
    page === 'chartPage' ? chartPage() :
    page === 'eventPage' ? eventPage() :
    page === 'storePage' ? storePage() :
    page === 'votingPage'? votingPage():
    '';
}

function chartPage(){

    const $ = (el, all) => all ? document.querySelectorAll(el) : document.querySelector(el);
    const $canvas1 = document.querySelector('#canvas1');
    const $canvas2 = document.querySelector('#canvas2');
    const $canvas3 = document.querySelector('#canvas3');
    const ctx1 = $canvas1.getContext('2d');
    const ctx2 = $canvas2.getContext('2d');
    const ctx3 = $canvas3.getContext('2d');
    
    const canvasWidth = 1000;
    const canvasHeight = 400;
    $canvas1.width = canvasWidth;
    $canvas1.height = canvasHeight;
    
    $canvas2.width = canvasWidth;
    $canvas2.height = canvasHeight;
    
    $canvas3.width = canvasWidth;
    $canvas3.height = canvasHeight;

    async function render1() {
    
        let datas = await get('/restAPI/utilityBills.php?mm=04&yyyy=2022');
    
        datas = datas.electric;
        const limit = 50;
        const [pl, pr, pt, pb] = [50, 0, 20, 30];
        let maxValue = Math.max(Math.max(datas.lastMonth, datas.thisMonth, datas.avgMonth, datas.goal));
        maxValue = Math.ceil(maxValue / limit) * limit;
        const maxHeight = canvasHeight - pt - pb;
        const rowConut = maxValue / limit;
        const rowLimit = maxHeight / rowConut;
        for (let i = 0; i <= rowConut; i++) {
    
            const y = maxHeight + pt - rowLimit * i;
            ctx1.beginPath();
    
            ctx1.fillStyle = '#fff';
            ctx1.fillRect(pl, y, canvasWidth - pl - pr, 1);
            
            ctx1.fillStyle = '#cfa63c';
            ctx1.textAlign = 'right'
            ctx1.fillText(limit * i, pl, y + 5);
            
        }
        ctx1.textAlign = 'center';
        ctx1.fillText('전기 사용량(kw)', canvasWidth/2+pl,pt/2);
    
        const width = 150;
        const px = 50;
        const rowWidth = canvasWidth - px * 2 - pl - pr;
        const gap = (rowWidth - width * 3) / 2;
        const p = maxHeight / maxValue;
    
        ctx1.fillStyle = '#cfa63c'
        const draws = (title, data, idx) => {
            const height = p * data;
            const x = px + pl + (width * idx) + (gap * idx);
            const y = maxHeight + pt - height;
            ctx1.beginPath();
            ctx1.fillStyle = '#4e1414'
            ctx1.fillRect(x, y, width, height)
            ctx1.textAlign = 'center';
            ctx1.fillStyle = '#fff'
            ctx1.fillStyle = '#cfa63c'
            ctx1.fillText(title, x + width / 2, maxHeight + pt + pb / 3);
            ctx1.fillText(data, x + width / 2, y - 5);
        };
        
        draws('월 사용량', datas.thisMonth, 0);
        draws('지난달 사용량', datas.lastMonth, 1);
        draws('동일 면적 평균 사용량', datas.avgMonth, 2);
        const lineDraw = (data,idx) =>{
            const x = px + pl + (width * idx) + (gap * idx) + width/2;
            const y = maxHeight + pt - p*data;
            idx ? ctx1.lineTo(x,y,) : ctx1.moveTo(x,y,)
            ctx1.strokeStyle = '#cfa63c';
            ctx1.stroke();
        };
        lineDraw(datas.goal,0)
        lineDraw(datas.goal,1)
        lineDraw(datas.goal,2)
        const drawC = (data,idx) => {
            const x = px + pl + (width * idx) + (gap * idx) + width/2;
            const y = maxHeight + pt - p*data;
            ctx1.arc(x,y,5,0,Math.PI*2);
            ctx1.fill();
            ctx1.fillText(data,x,y-5)
        }
        drawC(datas.goal,0)
        drawC(datas.goal,1)
        drawC(datas.goal,2)
    
    }
    
    render1();
    
    async function render2() {
        let datas = await get('/restAPI/utilityBills.php?mm=04&yyyy=2022');
    
        datas = datas.water;
        const limit = 1;
        const [pl, pr, pt, pb] = [50, 0, 20, 30];
        let maxValue = Math.max(Math.max(datas.lastMonth, datas.thisMonth, datas.avgMonth, datas.goal));
        maxValue = Math.ceil(maxValue / limit) * limit;
        const maxHeight = canvasHeight - pt - pb;
        const rowConut = maxValue / limit;
        const rowLimit = maxHeight / rowConut;
        for (let i = 0; i <= rowConut; i++) {
    
            const y = maxHeight + pt - rowLimit * i;
            ctx2.beginPath();
    
            ctx2.fillStyle = '#fff';
            ctx2.fillRect(pl, y, canvasWidth - pl - pr, 1);
            
            ctx2.fillStyle = '#cfa63c';
            ctx2.textAlign = 'right'
            ctx2.fillText(limit * i, pl, y + 5);
            
        }
        ctx2.textAlign = 'center';
        ctx2.fillText('수도 사용량(㎥)', canvasWidth/2+pl,pt/2);
    
        const width = 150;
        const px = 50;
        const rowWidth = canvasWidth - px * 2 - pl - pr;
        const gap = (rowWidth - width * 3) / 2;
        const p = maxHeight / maxValue;
    
        ctx2.fillStyle = '#cfa63c'
        const draws = (title, data, idx) => {
            const height = p * data;
            const x = px + pl + (width * idx) + (gap * idx);
            const y = maxHeight + pt - height;
            ctx2.beginPath();
            ctx2.fillStyle = '#4e1414'
            ctx2.fillRect(x, y, width, height)
            ctx2.textAlign = 'center';
            ctx2.fillStyle = '#fff'
            ctx2.fillStyle = '#cfa63c'
            ctx2.fillText(title, x + width / 2, maxHeight + pt + pb / 3);
            ctx2.fillText(data, x + width / 2, y - 5);
        };
        
        draws('월 사용량', datas.thisMonth, 0);
        draws('지난달 사용량', datas.lastMonth, 1);
        draws('동일 면적 평균 사용량', datas.avgMonth, 2);
        const lineDraw = (data,idx) =>{
            const x = px + pl + (width * idx) + (gap * idx) + width/2;
            const y = maxHeight + pt - p*data;
            idx ? ctx2.lineTo(x,y,) : ctx2.moveTo(x,y,)
            ctx2.strokeStyle = '#cfa63c';
            ctx2.stroke();
        };
        lineDraw(datas.goal,0)
        lineDraw(datas.goal,1)
        lineDraw(datas.goal,2)
        const drawC = (data,idx) => {
            const x = px + pl + (width * idx) + (gap * idx) + width/2;
            const y = maxHeight + pt - p*data;
            ctx2.arc(x,y,5,0,Math.PI*2);
            ctx2.fill();
            ctx2.fillText(data,x,y-5)
        }
        drawC(datas.goal,0)
        drawC(datas.goal,1)
        drawC(datas.goal,2)
    
    }
    
    render2();
    
    async function render3() {
          let datas = await get('/restAPI/utilityBills.php?mm=04&yyyy=2022');
    
        datas = datas.gas;
        const limit = 10;
        const [pl, pr, pt, pb] = [50, 0, 20, 30];
        let maxValue = Math.max(Math.max(datas.lastMonth, datas.thisMonth, datas.avgMonth, datas.goal));
        maxValue = Math.ceil(maxValue / limit) * limit;
        const maxHeight = canvasHeight - pt - pb;
        const rowConut = maxValue / limit;
        const rowLimit = maxHeight / rowConut;
        for (let i = 0; i <= rowConut; i++) {
    
            const y = maxHeight + pt - rowLimit * i;
            ctx3.beginPath();
    
            ctx3.fillStyle = '#fff';
            ctx3.fillRect(pl, y, canvasWidth - pl - pr, 1);
            
            ctx3.fillStyle = '#cfa63c';
            ctx3.textAlign = 'right'
            ctx3.fillText(limit * i, pl, y + 5);
            
        }
        ctx3.textAlign = 'center';
        ctx3.fillText('수도 사용량(N㎥)', canvasWidth/2+pl,pt/2);
    
        const width = 150;
        const px = 50;
        const rowWidth = canvasWidth - px * 2 - pl - pr;
        const gap = (rowWidth - width * 3) / 2;
        const p = maxHeight / maxValue;
    
        ctx3.fillStyle = '#cfa63c'
        const draws = (title, data, idx) => {
            const height = p * data;
            const x = px + pl + (width * idx) + (gap * idx);
            const y = maxHeight + pt - height;
            ctx3.beginPath();
            ctx3.fillStyle = '#4e1414'
            ctx3.fillRect(x, y, width, height)
            ctx3.textAlign = 'center';
            ctx3.fillStyle = '#fff'
            ctx3.fillStyle = '#cfa63c'
            ctx3.fillText(title, x + width / 2, maxHeight + pt + pb / 3);
            ctx3.fillText(data, x + width / 2, y - 5);
        };
        
        draws('월 사용량', datas.thisMonth, 0);
        draws('지난달 사용량', datas.lastMonth, 1);
        draws('동일 면적 평균 사용량', datas.avgMonth, 2);
        const lineDraw = (data,idx) =>{
            const x = px + pl + (width * idx) + (gap * idx) + width/2;
            const y = maxHeight + pt - p*data;
            idx ? ctx3.lineTo(x,y,) : ctx3.moveTo(x,y,)
            ctx3.strokeStyle = '#cfa63c';
            ctx3.stroke();
        };
        lineDraw(datas.goal,0)
        lineDraw(datas.goal,1)
        lineDraw(datas.goal,2)
        const drawC = (data,idx) => {
            const x = px + pl + (width * idx) + (gap * idx) + width/2;
            const y = maxHeight + pt - p*data;
            ctx3.arc(x,y,5,0,Math.PI*2);
            ctx3.fill();
            ctx3.fillText(data,x,y-5)
        }
        drawC(datas.goal,0)
        drawC(datas.goal,1)
        drawC(datas.goal,2)
    
    }
    
    render3();
}

async function eventPage(){
    const $container = document.querySelector('.aa');
    const $evnet = [...document.querySelectorAll('.evnet .item')];
    const data = await get('/restAPI/event.php?yyyy=2022');
    const $next = document.querySelector('.next');
    const $prev = document.querySelector('.prev');
    let year = new Date().getFullYear();

    function ac(day, end, month){
        let div = document.createElement('div');
        div.innerHTML = `
        <h3 class="month">${month}월</h3>
        <div class="cc">
        <div class="w">일</div><div class="w">월</div><div class="w">화</div><div class="w">수</div><div class="w">목</div><div class="w">금</div><div class="w">토</div>
        ${'<div ></div>'.repeat(day)}
        ${ Array.from(Array(end), (_,idx) => `<div class="item">${idx+1}</div>`).join('')}
        </div>
        `;
        const $item = [...div.querySelectorAll('.item')];

        $item.forEach((e,idx) => {
            data.items.map(({startDt, endDt}) =>{
                if( parseInt(startDt.slice(0,4)) == +year && parseInt(startDt.slice(5,7)) == +month && +e.innerText == parseInt(startDt.slice(8,10)) ){
                    let start = parseInt(startDt.slice(8,10));
                    let end = parseInt(endDt.slice(8,10));
                    for( i = start; i <= end; i++ ){
                        $item[i-1].classList.add('activeEvent');
                    }
                }
            })
        });
        $container.append(div);
    };

    function render(year){
        const $year = document.querySelector('.yearText');
        $year.innerHTML = `<h2 class="year">${year}년</h2>`;
        $next.innerHTML = `<h2 class="year">${year+1}</h2>`;
        $prev.innerHTML = `<h2 class="year">${year-1}</h2>`;
        for(let month = 0; month < 12; month++){
            let ym1 = new Date(year, month,1);
            let ym2 = new Date(year, month-1,0);
            ac(ym1.getDay(),ym2.getDate(),month+1 );
        }
    };
    
    function callRender(){
        [...$('.years',true)].forEach(e => e.innerHTML = year);
        $evnet.forEach( e => {
            data.items.map(({startDt, endDt,eventSj}) => {
                e.innerHTML += parseInt(startDt.slice(5,7)) == +e.dataset.month  &&  +e.dataset.year == year? `
                <div class="evnets">
                <p> ${startDt} ~ ${endDt} ${eventSj}</p>
                </div>
                `:''; 
            });
        })
    };

    [...document.querySelectorAll('.moveBtn')].map(e => {
        e.addEventListener("click", function(){
            $container.innerHTML = '';
            year = +this.dataset.y ? year+1 :year-1;
            render(year);
            $('.evnets',true).forEach(e => e.remove());
            callRender();
        })
    });
    callRender();
    render(year);

}

function storePage(){
    const $item = [...document.querySelectorAll('.store .item')];
    let nowPage = 0;
    
    let maxPage = Math.ceil($item.length/6);
    
    function render(nowPage){
        $('.num').innerText = $item.length;
        $('.nowPage').innerText = nowPage+1;
        $('.maxPage').innerText = maxPage;

        $item.forEach(e => e.classList.add('none'))
        let startItem = nowPage*6;
        let endItem = startItem+6;
        
        for(let i = startItem; i < endItem; i++){
            $item[i]?.classList?.remove('none');
        };
        
        let startNum = Math.floor(nowPage/10)*10
        let endNum = startItem+10 > maxPage ? maxPage : startItem+10;

        $('.n_btn').innerHTML = '';
        for(let i = startNum; i <  endNum; i++){
            $('.n_btn').innerHTML += `<div class="${i == +nowPage ?"active" : ''}">${i+1}</div>`;
        }

        [...$('.n_btn>div', true)].forEach(e => {
            e.addEventListener("click", function(){
                nowPage = e.innerText-1;
                render(nowPage);
            })
        });
    };
    
    $item.forEach(e => {
        e.addEventListener("click",async function() {
            let data = await get(`/api/${+this.dataset.idx}`);
            $('.update_wrap').classList.remove('none');
            let form = document.update_form;
            form[0].value = data.idx;
            form[1].value = data.name;
            $(".update_wrap input[type='radio']",true).forEach(e => e.value == data.type ? e.checked = true : '');
            form[6].value = data.phone;
            form[7].value = data.adress;
            form[8].value = data.rm;

        });
    });

    render(nowPage);
    // 모달 닫는 함수

    [...$('.close_btn',true)].forEach(e => {
        e.addEventListener("click", function(){
            clsoeModal();
        })
    });
    function clsoeModal(){
        [...$('.popupwrap',true)].forEach(e => {
            e.classList.add('none');
            e.querySelector('form').reset();
        })
    };
    // 페이지 네이션
    [...$('.pageing button',true)].forEach(e => {
        e.addEventListener("click", function(){
            nowPage = +this.dataset.y ? Math.floor(nowPage/10)+11 : 
            nowPage-10 < 0 ? 1 : Math.floor(nowPage/10)-10 ;
            render(nowPage);
        })
    });
    // insert
    $('.addBtn').addEventListener("click", () => {
        $('.insert_form').classList.remove('none');

    });
}

function votingPage(){
    
}