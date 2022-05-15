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
    const [pl,pr,pt,pb] = [50,0,20,30];
    const maxHeight = (canvasHeight-pt-pb)
    let maxValue = Math.max(...dummy.map(({oldValue, newValue}) => Math.max(oldValue,newValue)));
    maxValue = Math.ceil(maxValue/limit)*limit;

    const rowCount = maxValue/limit;
    const rowLimit = maxHeight/rowCount;
    for(let i =0; i <= rowCount; i++){
        const y = maxHeight+pt-i*rowLimit; 
        ctx.beginPath();
        ctx.fillStyle = '#eee';
        ctx.textAlign = 'right';
        ctx.fillRect(pl,y,canvasWidth-pr-pl,1);

        ctx.textAlign = 'center';
        ctx.fillStyle = '#777';
        ctx.fillText(i*limit,pl-10,y+5);
    }
    const width = 150;
    const px = 50;
    const rowWidth = canvasWidth-pt-pr-px*2;
    const gap = (rowWidth-width*length)/(length-1);
    const p = maxHeight/maxValue
    console.log(gap);
    dummy.map(({title,oldValue, newValue}, idx) => {
        const height = p*newValue;
        const x = pl+px+ (width*idx) + (gap*idx);
        const y = maxHeight+pt-height;
        
        ctx.beginPath();
        ctx.fillStyle = '#777';
        ctx.fillRect(x,y,width,height);

        ctx.font = '16px serif bold';
        ctx.fillText(title,x + width/2,maxHeight+pt+pb/2);
        ctx.fillStyle = 'blue';
        ctx.fillText(newValue,x + width/2,y-10);

    });

    dummy.forEach(({oldValue},idx) => {
        const x = px + pl + (width*idx) + (gap*idx) + (width/2);
        const y = maxHeight+pt - oldValue*p;
        idx ? ctx.lineTo(x,y) : ctx.moveTo(x,y);
        ctx.stroke();
    })

    dummy.forEach(({oldValue},idx) => {
        const x = px + pl + (width*idx) + (gap*idx) + (width/2);
        const y = maxHeight+pt - oldValue*p;
        ctx.beginPath();
        
        ctx.fillStyle = 'red';
        ctx.arc(x,y,5,0,Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = 'blue';
        ctx.fillText(oldValue, x ,y-10);
    })
}

render();