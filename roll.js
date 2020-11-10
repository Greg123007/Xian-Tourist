var container = document.getElementById("container");
 
var content = document.getElementById("content");
 
var slider = document.getElementById("slider");
 
var xianimg = document.getElementById("xianimg");
 
var ul = document.getElementById("ul");
 
var lit = document.querySelectorAll("li.lit");
 
var left = document.getElementById("left");
 
var right = document.getElementById("right");
 
var num = 0;
 
var timer = null;

var positiondiv = document.getElementById("positiondiv");

var arrUrl = ["bell tower.jpeg","big-wild-goose-pagoda.jpg","muslim.jpg","xianwall.jpg","terracotta1.jpg"];

var arrPosition = ["#bell","#goose","#muslim","#wall","#terracotta"];

//left arrow click
left.onclick = function (ev) {

    num--;

    if (num == -1){

        num = arrUrl.length-1;//如果到了第一张，返回最后一张

    }

    changeImg();

};
//right arrow click
right.onclick = function (ev) {

    num++;

    if (num == arrUrl.length){

        num = 0;//如果是最后一张，则返回第一张

    }

    changeImg();

};

//点击小圆点跳转到对应的图片

for (var i=0;i<arrUrl.length;i++){

       lit[i].index = i;

       lit[i].onclick = function (ev) {

           num = this.index;

           changeImg();

       }

}



setTimeout(autoPlay(),1000);//延迟1秒执行自动切换



//鼠标移入清除定时器，鼠标移出恢复

content.onmouseover = function (ev) {

    clearInterval(timer);

};

content.onmouseout = autoPlay;



//图片切换函数

function changeImg() {
    
    xianimg.src = arrUrl[num];//改变图片src位置
    positiondiv.href = arrPosition[num];

    for (var i = 0;i< lit.length;i++){//改变原点样式

        lit[i].className = "";

    }

    lit[num].className = "active";

}

//设置定时器

function autoPlay() {

    timer = setInterval(function () {

        num++;

        num %= arrUrl.length;

        changeImg();

    },3000);

}
