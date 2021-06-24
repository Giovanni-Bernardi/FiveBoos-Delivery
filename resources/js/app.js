/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { method, isSet, fromPairs } = require('lodash');

require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import axios from 'axios';
import Vue from 'vue';

//mouse follow
var cursorFollow = document.querySelectorAll('.popup-note');

//TEST FUNZIONE SCOLL 1
$(document).on('scroll', function(e) {
    var value = $(this).scrollTop();
    if ( value < 100 ){
        $("header").css("background", "transparent");
    }
    else{
        $("header").css("background", "red");
    }
});

// TEST FUNZIONE SCOLL 2
// window.onscroll = function() {scrollFunction()};

//  function scrollFunction() {
//    if (document.body.scrollTop >80 || document.documentElement.scrollTop >80) {
//      $('nav').addClass('navbar-shrink');
//    } else {
//      $('nav').removeClass('navbar-shrink');
//    }
// }

function PopupModal(){
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
    modal.style.display = "block";
    }
    span.onclick = function() {
    modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
document.addEventListener('DOMContentLoaded', PopupModal);