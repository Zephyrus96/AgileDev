/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

window.Pusher = require('pusher-js');

import Echo from "laravel-echo";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});

// Configuring Notifications

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '00f2d33b023f7cffc7ff',
//     cluster: 'ap2',
//     encrypted: true
// })

// var notifications = [];

// const NOTIFICATION_TYPES = {
//     user: 'App\\Notifications\\Notifications'
// };


// if(username){
//     fetch('/notifications')
//     .then(res => res.json())
//     .then(data => addNotifications(data));

//     window.Echo.private(`App.User.${username}`)
//     .notification((notification) => {
//         addNotifications([notification]);
//     });
// }

// const addNotifications = newNotifications => {
//     notifications = [newNotifications, ...notifications];
//     showNotifications(notifications);
// }



// const showNotifications = notifications => {
//     let newNotifications;
   
//     if(notifications.length){
//         let notificationList = document.querySelector('.user__notifications ul');
//         let notificationNum = document.querySelector('.num__notifications');

//         // Remove old notifications if they exist.
//         while(notificationList.lastChild){
//             notificationList.lastChild.remove();
//         }

//         // Map notification array with html.
//         newNotifications = notifications[0].map((notification,i) => {
//             return singleNotification(notification);
//         });

//         newNotifications.forEach(notification => {
//             const listElement = document.createElement('li');
//             listElement.innerHTML = notification;
//             notificationList.appendChild(listElement);
//         });
        
//         notificationNum.innerHTML = newNotifications.length;
//         notificationNum.style.display = "inline-block";
//     }
// }

// const singleNotification = notification => {
//     return notification.data.body;
// }


// const markAsRead = () => {

// }




