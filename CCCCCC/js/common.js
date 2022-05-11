const $calendar = document.getElementById('calendar');
const $yearButton = [...document.querySelectorAll('.year-button')];
let year = new Date().getFullYear();
const w = `<div class="w">일</div><div class="w">월</div><div class="w">화</div><div class="w">수</div><div class="w">목</div><div class="w">금</div><div class="w">토</div>`;
function ac(day,end,month){
	const c = document.createElement('div');
	c.innerHTML = `
		<h3>${month}월</h3>
		<div class="calendar">
			${w}
			${ '<div></div>'.repeat(day) }
			${ Array.from( Array(end), (_,idx) => `<div>${idx+1}</div>` ).join('') }
		</div>
	`;
	$calendar.append(c);
}
function render(year){
	$calendar.innerHTML = `<h1>${year}현재 연도 데스</h1>`;
	for(let month=0; month<12; month++){
		const ym = new Date(year,month,1);
		const ym2 = new Date(year,month+1,0);
		ac(ym.getDay(),ym2.getDate(),month+1);
	}
}
$yearButton.map( $btn => $btn.addEventListener('click',function(){
	year = +this.dataset.y ? year+1 : year-1;
	render(year);	
}));
render(year);