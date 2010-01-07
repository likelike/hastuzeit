const snowflakes=15;

function init(){
	var first=true;
	for(var i=0;i<snowflakes;i++){
		document.body.appendChild(createASnowflake(first));
		first=false;
	}
}

function randomInteger(low,high){
	return low+Math.floor(Math.random()*(high-low));
}

function randomFloat(low,high){
	return low+Math.random()*(high-low);
}

function randomItem(items){
	return items[randomInteger(0,items.length-1)]
}

function durationValue(value){
	return value+'s';
}

function createASnowflake(is_first){
	
	var flakes=['2746','2745','2744','2733'];
	var superFlakes=['2746','2745','2744','fc7','274b','2749','2747','2746','273c','273b','2734','2733','2732','2731','2725'];
	var sizes=['tiny','tiny','tiny','small','small','small','small','medium','medium','medium','medium','medium','medium','large','massive'];
	var snowflakeElement=document.createElement('div');
	snowflakeElement.className='snowflake '+randomItem(sizes);
	
	var snowflake=document.createElement('span');
	snowflake.innerHTML='&#x'+randomItem(flakes)+';';
	snowflakeElement.appendChild(snowflake);
	
	var spinAnimationName=(Math.random()<0.5)?'clockwiseSpin':'counterclockwiseSpin';
	var anchorSide=(Math.random()<0.5)?'left':'right';
	var fadeAndDropDuration=durationValue(randomFloat(5,11));
	var spinDuration=durationValue(randomFloat(4,8));
	var flakeDelay=is_first?0:durationValue(randomFloat(0,10));
	
	snowflakeElement.style.webkitAnimationName='fade, drop';
	snowflakeElement.style.webkitAnimationDuration=fadeAndDropDuration+', '+fadeAndDropDuration;
	snowflakeElement.style.webkitAnimationDelay=flakeDelay;
	snowflakeElement.style[anchorSide]=randomInteger(0,60)+'%';
	snowflake.style.webkitAnimationName=spinAnimationName;
	snowflake.style.webkitAnimationDuration=spinDuration;
	return snowflakeElement;
}

window.onload=init;