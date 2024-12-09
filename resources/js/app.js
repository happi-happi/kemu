import './bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '412020337c73dad8201d',   // Replace with your app's key
    cluster: 'mt1', // Replace with your app's cluster
    forceTLS: true
});

window.Echo.private('chat.' + userId) // Use dynamic user ID
    .listen('MessageSent', (event) => {
        console.log(event);
        // Handle the new message here, e.g., append to chat
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML += `<p><strong>${event.sender.name}:</strong> ${event.message}</p>`;
    });

