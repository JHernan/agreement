import Vue from 'vue';
import Example from './components/example'
/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    components: {Example},
    data: {
        'city': '',
        'partner_name_1': '',
        'partner_nationality_1': '',
        'partner_address_1': '',
        'partner_town_1': '',
        'partner_id_1': '',
        'partner_name_2': '',
        'partner_nationality_2': '',
        'partner_address_2': '',
        'partner_town_2': '',
        'partner_id_2': '',
    },
    delimiters: ['${', '}']
});
