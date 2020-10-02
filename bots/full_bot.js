// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        https://yandex.ru/*
// @match        https://xn----7sbab5aqcbiddtdj1e1g.xn--p1ai/*
// @match        https://crushdrummers.ru/*
// @grant        none
// ==/UserScript==

let yandexInput = document.getElementsByClassName("input__control input__input mini-suggest__input")[0];
let nextPage = document.getElementsByTagName('a');
let tekPage = document.getElementsByTagName('span');
let sites = {
    "xn----7sbab5aqcbiddtdj1e1g.xn--p1ai":["Гобой","Саксофон","Валторна","Фагот","Скрипка","Флейта","Как звучит флейта"],
    "crushdrummers.ru":["Барабанное шоу","Шоу барабанщиков в Москве","Заказать барабанщиков в Москве"]
};
let site = Object.keys(sites)[getRandom(0,Object.keys(sites).length)];
let keywords = sites[site];
let keyword = keywords[getRandom(0,keywords.length)];
let i = 0;

function getRandom(min,max){
    return Math.floor(Math.random()*(max-min)+min);
}
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

if (yandexInput!=undefined){ // Если мы на главной странице Yandex
    site = "site" + site;
}else{ // Если уже не на главной странице Yandex
    site = getCookie("site");
}


if (yandexInput!=undefined){
    let timerId = setInterval(()=>{
        yandexInput.value += keyword[i++];
        if (i==keyword.length){
            clearInterval(timerId);
            document.getElementsByClassName("button mini-suggest__button button_theme_websearch button_size_ws-head i-bem button_js_inited")[0].click();
        }
    },500);
}else if (location.hostname == "yandex.ru"){
    let links = document.links;
    let flag = true;
    for(let i=0; i<links.length; i++){
        links[i].setAttribute('target', '_self');
        if(links[i].href.indexOf(site) != -1){
            setTimeout(()=>links[i].click(),2000);
            flag=false;
            break;
        }
    }

    for(let i = 0;i<tekPage.length;i++){
      tekPage[i].getAttribute('aria-label');
      if(tekPage[i].getAttribute('aria-label')=="Текущая страница 3"){
        location.href = "https://yandex.ru/";
      }
    }

    function pageLoad(){
        for(let i = 0;i<nextPage.length;i++){
            if(nextPage[i].getAttribute('aria-label')=="Следующая страница"){
                nextPage[i].click();
            }
        }
     }
    if(flag) setTimeout(()=>pageLoad(),2000);

}else{
    if (getRandom(0,100)>=80){
        location.href = "https://yandex.ru/";
    }else{
        let links = document.links;
        setInterval(()=>{
            let index = getRandom(0,links.length);
            console.log("Я не умер, я ещё живой! Проверяю ссылку: "+links[index]);
            if(links[index].href.indexOf(location.hostname) != -1){
                links[index].click();
            }
        },3000);
    }
}