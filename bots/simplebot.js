// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        https://yandex.ru/*
// @grant        none
// ==/UserScript==

let yandexInput = document.getElementsByClassName("input__control input__input mini-suggest__input")[0];
let nextPage = document.getElementsByTagName('a');
let tekPage = document.getElementsByClassName("pager__item pager__item_current_yes pager__item_kind_page");
let keywords = ["Гобой","Саксофон","Валторна","Фагот","Скрипка","Флейта","Как звучит флейта"];
//let keywords = ["Гобой"];
let keyword = keywords[getRandom(0,keywords.length)];
let i = 0;

function getRandom(min,max){
    return Math.floor(Math.random()*(max-min)+min);
}

if (yandexInput!=undefined){
    let timerId = setInterval(()=>{
        yandexInput.value += keyword[i++];
        if (i==keyword.length){
            clearInterval(timerId);
            document.getElementsByClassName("button mini-suggest__button button_theme_websearch button_size_ws-head i-bem button_js_inited")[0].click();
        }
    },100);
}else{
    let links = document.links;
    let flag = true;
    let tekPage = document.getElementsByClassName("pager__item pager__item_current_yes pager__item_kind_page");
    let numPages = document.getElementsByClassName("link link_theme_none link_target_serp pager__item pager__item_kind_page i-bem");
    let numPageNext = document.getElementsByClassName("link link_theme_none link_target_serp pager__item pager__item_kind_next i-bem");

    for(let i=0; i<links.length; i++){
        links[i].removeAttribute('target');
        console.log(i);
        if(links[i].href.indexOf("https://xn----7sbab5aqcbiddtdj1e1g.xn--p1ai") != -1){
            setTimeout(()=>links[i].click(),2000);
            flag=false;
            break;
        }
    }
    function pageLoad(){
        for(let i = 0;i<nextPage.length;i++){
            if(nextPage[i].getAttribute('aria-label')=="Следующая страница"){
                nextPage[i].click();
            }
        }
     }

//   if(tekPage.getAttribute('aria-label')=="Текущая страница 10") location.href = "https://yandex.ru/";
    if(flag) setTimeout(()=>pageLoad(),2000);
}
