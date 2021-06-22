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

// document.addEventListener('mousemove', fn, false);

function fn(e) {
  for (var i = cursorFollow.length; i--;) {
    cursorFollow[i].style.left = e.pageX + 'px';
    cursorFollow[i].style.top = e.pageY + 'px';
  }
}