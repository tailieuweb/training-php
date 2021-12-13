/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Botble from './utils';
import Vue from 'vue';
import ActivityLogComponent from './components/dashboard/ActivityLogComponent';

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('activity-log-component', ActivityLogComponent);

/**
 * This let us access the `__` method for localization in VueJS templates
 * ({{ __('key') }})
 */
Vue.prototype.__ = (key) => {
    return _.get(window.trans, key, key);
};

import sanitizeHTML from 'sanitize-html';
Vue.prototype.$sanitize = sanitizeHTML;

new Vue({
    el: '#app'
});

require('./form');
require('./avatar');

$(document).ready(() => {
    if (window.noticeMessages) {
        window.noticeMessages.forEach(message => {
           Botble.showNotice(message.type, message.message, message.type === 'error' ? _.get(window.trans, 'notices.error') : _.get(window.trans, 'notices.success'));
        });
    }
});
