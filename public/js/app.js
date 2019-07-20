import Vue from 'vue';
import Example from './components/example'
/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    components: {Example},
    data: {
        'message': ''
    },
    delimiters: ['${', '}']
});
