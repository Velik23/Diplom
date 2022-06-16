/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
window.$ = require("jquery");

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// jQuery("#crypt").click(function (event) {
//     event.preventDefault();
//     let message = jQuery('#message').val(),
//         type = jQuery('input[name=encrypt_method]:checked').val();
//     let file = $('#file').prop('files')[0];
//
//     if (message === '' && $('#file').prop('files').length === 0) {
//         return false;
//     }
//
//     let data = new FormData();
//     data.append('file', file);
//     data.append('message', message);
//     data.append('type', type);
//
//
//     jQuery.ajax({
//         method: "POST",
//         url: "/crypt",
//         cache: false,
//         contentType: 'multipart/form-data',
//         processData: false,
//         data: {
//             data: data,
//             // message: message,
//             // encrypt_method: type,
//             // file: $('#file').prop('files')[0]
//         },
//         success: function (data) {
//             $('#message-block').prepend(data);
//             // document.location.reload(true);
//         },
//         dataType: 'html'
//     });
// });

jQuery(".decrypt").click(function (event) {
    event.preventDefault();
    let form = $(this).parent().parent();
    let messageId = form.children('.messageId').val();

    if (messageId === '') {
        return false;
    }

    jQuery.ajax({
        method: "POST",
        url: "/decrypt",
        data: {
            id: messageId
        },
        success: function (data) {
            $('#message-block').prepend(data);
            $('#myModal').modal('show');
        }
    });
});

jQuery('.delete-message').click(function (event) {
    event.preventDefault();
    let message = $(this).parent().parent();
    let id = this.dataset.id;
    console.log(id);

    jQuery.ajax({
        method: "POST",
        url: "/message/delete/" + id,
        data: {
            message: id
        },
        success: function () {
            message.remove();
        }
    });
});
// const app = new Vue({
//     el: '#app',
// });


