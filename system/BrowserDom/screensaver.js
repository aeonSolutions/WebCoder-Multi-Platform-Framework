var num;
var temp=0;
var speed=5000; /* this is set for 5 seconds, edit value to suit requirements */
var preloads=[];

/* add any number of images here */

preload(
'system/GUI/graphics/wallpapers/airplane_sky.jpg',
'system/GUI/graphics/wallpapers/beach.jpg',
'system/GUI/graphics/wallpapers/dh_jump.jpg',
'system/GUI/graphics/wallpapers/dh_mountain.jpg',
'system/GUI/graphics/wallpapers/dh_sand.jpg',
'system/GUI/graphics/wallpapers/dh_trees.jpg',
'system/GUI/graphics/wallpapers/greengarden.jpg',
'system/GUI/graphics/wallpapers/planetary.jpg',
'system/GUI/graphics/wallpapers/sunset.jpg',
'system/GUI/graphics/wallpapers/zealand.jpg'
);

function preload(){

for(var c=0;c<arguments.length;c++) {
preloads[preloads.length]=new Image();
preloads[preloads.length-1].src=arguments[c];
}
}

function rotateImages(element_id) {
num=Math.floor(Math.random()*preloads.length);
if(num==temp){
rotateImages('dlg-screen-wallpaper');
}
else{
	document.getElementById(element_id).style.backgroundImage='url('+preloads[num].src+')';
temp=num;

setTimeout(function(){rotateImages('dlg-screen-wallpaper')},speed);
}
}

if(window.addEventListener){
window.addEventListener('load',function(){setTimeout(function(){rotateImages('dlg-screen-wallpaper')},speed)},false);
}
else { 
if(window.attachEvent){
window.attachEvent('onload',function(){setTimeout(function(){rotateImages('dlg-screen-wallpaper')},speed)});
}
}
