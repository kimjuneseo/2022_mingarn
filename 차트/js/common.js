const $canvas = document.getElementById('chart');
const ctx = $canvas.getContext('2d');

const canvasWidth = 1000;
const canvasHeight = 400;
$canvas.width = canvasWidth;
$canvas.height = canvasHeight;

const r = (max,min) => Math.floor(Math.random()*(max-min))+min;
const t = (length) => `poiuytrewqlkjhgfdsamnbvcxzPOIUYTREWQLKJHGFDSAMNBVCXZX`.split('').sort( () => Math.random()*5 ).join('').slice(0,length);

const dummy = [
	{ 
		title : t(r(10,3)),
		newValue:r(800,50),
		oldValue:r(800,50)
	},
	{ 
		title : t(r(10,3)),
		newValue:r(800,50),
		oldValue:r(800,50)
	},
	{ 
		title : t(r(10,3)),
		newValue:r(800,50),
		oldValue:r(800,50)
	},
];


function render(){
	const length = dummy.length;
	const limit = 100; // 간격 
	// text때문에 여백을 줌
	const [pl,pr,pt,pb] = [50,0,10,50];
	const maxHeight = (canvasHeight-pt-pb);
	
	// 리턴된 배열을 스프래드로 풀어씀 그리고 그중에 가장 큰 값
	let maxValue = Math.max(...dummy.map( ({newValue,oldValue}) => Math.max(newValue,oldValue)  ));
	// 올림
	maxValue = Math.ceil(maxValue/limit)*limit;	

	// row 개수
	const rowCount = Math.round(maxValue/limit);
	// row 간격
	const rowLimit = maxHeight/rowCount;
	// 
	const p = maxHeight/maxValue;
	
	for(let i=0; i<=rowCount; i++){
		// 선 그어주기
		const y = canvasHeight-i*rowLimit-pb;
		ctx.beginPath();
		ctx.fillStyle = '#eee';
		ctx.fillRect(pl,y,canvasWidth-pr,1);
		// 값 그려주기
		ctx.textAlign = 'center';	
		ctx.fillStyle = '#777';
		ctx.fillText(limit*i,pl-5,y+5);
	}

	const width = 150;
	const px = 50;
	const maxWidth = canvasWidth-pl-pr-px*2;
	const gap = (maxWidth-width*length)/(length-1);

	dummy.forEach( ({title,newValue,oldValue},idx) => {
		const x = pl+px+(width*idx)+( gap*idx );
		console.log(x);
		const y = pt+maxHeight-p*newValue;
		const height = p*newValue;		


		ctx.beginPath();
		ctx.fillStyle = '#888';
		ctx.fillRect(x,y,width,height);
		ctx.fillStyle = 'red';
		ctx.font = '16px serif bold';
		ctx.fillText(newValue,x+width/2,y-5);

		ctx.fillStyle = 'blue';
		ctx.fillText(title,x+width/2,pt+maxHeight+pb/3);
	});

	ctx.beginPath();
	dummy.forEach(({oldValue},idx) => {
		const x = pl+px+(width*idx)+( gap*idx )+(width/2);
		const y = pt+maxHeight-p*oldValue;
		ctx.fillStyle = 'purple';
		idx ? ctx.lineTo(x,y) : ctx.moveTo(x,y);
		ctx.stroke();
	});
	dummy.forEach(({oldValue},idx) => {
		const x = pl+px+(width*idx)+( gap*idx )+(width/2);
		const y = pt+maxHeight-p*oldValue;
		ctx.beginPath();
		ctx.arc(x,y,5,0,Math.PI*2);	
		ctx.fill();

		ctx.textAlign = 'center';
		ctx.fillText(oldValue,x,y-10);	

	});


}

render();