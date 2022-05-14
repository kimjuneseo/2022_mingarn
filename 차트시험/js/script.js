const $canvas = document.getElementById('chart');
const ctx = $canvas.getContext('2d');
const canvasWidth = 1000;
const canvasHeight = 400;
$canvas.width = canvasWidth;
$canvas.height = canvasHeight;

const r = (max,min) => Math.round(Math.random() * (max-min)) + min;
const t = (length) => [...`asdfasdfafdasfL:KSJF:LSKDJFO`].sort(() => Math.random() - .5).join('').slice(0,length);

const dummy = [
    {
        title:t(r(10,3)),
        newValue:r(800,50),
        oldValue:r(800,50),
    },
    {
        title:t(r(10,3)),
        newValue:r(800,50),
        oldValue:r(800,50),
    },
    {
        title:t(r(10,3)),
        newValue:r(800,50),
        oldValue:r(800,50),
    },
];


function render(){
    const limit = 100;
    const length = dummy.length;
    const [pl,pr,pt,pb] = [50,0,50,10];
    let maxValue = Math.max(...dummy.map(({oldValue, newValue}) => Math.max(oldValue,newValue)));
    maxValue = Math.ceil(maxValue/limit)*limit;
    const rowCount = maxValue/limit;
    const rowLimit = (canvasHeight-pt-pb)/rowCount
    for(let i =0; i <= rowCount; i++){
        ctx.beginPath();
        ctx.fillStyle = '#eee';
        ctx.fillRect(pl,rowLimit*i-pb,canvasWidth-pr-pl,1);

        ctx.textAlign = 'center';
        ctx.fillStyle = '#777';
        ctx.fillText(limit*i,pl-10,canvasHeight-pt-pb-rowLimit*i-6)
    }
    const width = 150;
    const px = 50;
    const gap = canvasWidth-(width*length-1);
    // const p = 
    console.log(gap);
    dummy.map(({oldValue, newValue}, idx) => {
        const x = idx ? (pl+gap+width)*idx : px+pl
        console.log(x );
        ctx.beginPath();
        ctx.fillRect(x,100,width,100);
    })
    // const barWidth = 
}

render();