const $canvas = document.getElementById('chart');
const context = $canvas.getContext('2d');

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
	const [pl,pr,pt,pb] = [50,0,10,50];
	const limit = 100; // 간격 
	const maxHeight = (canvasHeight-pt-pb);
	let maxValue = Math.max(...dummy.map( ({newValue,oldValue}) => Math.max(newValue,oldValue)  ));
	maxValue = Math.ceil(maxValue/limit)*limit;
	const rowCount = Math.round(maxValue/limit);
	const rowLimit = maxHeight/rowCount;
	const p = maxHeight/maxValue;

	for(let i=0; i<=rowCount; i++){
		const y = canvasHeight-i*rowLimit-pb;
		context.beginPath();
		context.textAlign = 'right';
		context.fillStyle = '#eee';
		context.fillRect(pl,y,canvasWidth-pr,1);

		context.textAlign = 'center';	
		context.fillStyle = '#777';
		context.fillText(limit*i,pl-5,y+5);
	}

	const width = 150;
	const px = 50;
	const maxWidth = canvasWidth-pl-pr-px*2;
	const gap = (maxWidth-width*length)/(length-1);

	dummy.forEach( ({title,newValue,oldValue},idx) => {
		const x = pl+px+(width*idx)+( gap*idx );
		const y = pt+maxHeight-p*newValue;
		const height = p*newValue;		


		context.beginPath();
		context.fillStyle = '#888';
		context.fillRect(x,y,width,height);
		context.fillStyle = 'red';
		context.font = '16px serif bold';
		context.fillText(newValue,x+width/2,y-5);

		context.fillStyle = 'blue';
		context.fillText(title,x+width/2,pt+maxHeight+pb/3);
	});

	context.beginPath();
	dummy.forEach(({oldValue},idx) => {
		const x = pl+px+(width*idx)+( gap*idx )+(width/2);
		const y = pt+maxHeight-p*oldValue;
		context.fillStyle = 'purple';
		idx ? context.lineTo(x,y) : context.moveTo(x,y);
		context.stroke();
	});
	dummy.forEach(({oldValue},idx) => {
		const x = pl+px+(width*idx)+( gap*idx )+(width/2);
		const y = pt+maxHeight-p*oldValue;
		context.beginPath();
		context.arc(x,y,5,0,Math.PI*2);	
		context.fill();

		context.textAlign = 'center';
		context.fillText(oldValue,x,y-10);	

	});


}

render();