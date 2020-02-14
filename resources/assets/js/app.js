
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');
const feather = require('feather-icons');
feather.replace();
window.ClassicEditor = require('@diasraphael/ck-editor5-base64uploadadapter');
window.select2 = require('select2');

window.slugify = function(text){
    return text.toString().toLowerCase().
    replace(/\s+/g,'-').
    replace(/[^\w\-]+/g,'').
    replace(/\-\-+/g,'-').
    replace(/^-+/, '').
    replace(/-+$/,'');
};