window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window.Reactificate = require('@reactificate/clientside');
window.jQuery = window.$ = require('jquery');


const setWSConnectionState = (state) => {
    switch (state) {
        case 'connecting':
            return '<div class="badge badge-info p-1 font-weight-bold"><i class="fa fa-spinner fa-spin"></i> Connecting</div>';
        case 'reconnecting':
            return '<div class="badge badge-primary p-1 font-weight-bold"><i class="fa fa-spinner fa-spin"></i> Reconnecting</div>';
        case 'connected':
            return '<div class="badge badge-success p-1 font-weight-bold"><i class="fa fa-check-circle"></i> Connected</div>';
        case 'disconnected':
            return '<div class="badge badge-danger p-1 font-weight-bold"><i class="fa fa-skull-crossbones"></i> Disconnected</div>'
    }
};

window.initialiseWebsocket = function (username) {
    const websocket = new Reactificate.Websocket('ws://127.0.0.1:8001/ws/chat');
    const elConnectionState = document.getElementById('connection-state');
    const textareaMessage = document.getElementById('message');
    const elMessages = document.getElementById('messages');
    const $elMessages = $(elMessages);

    websocket.onOpen(() => {
        console.info('WS Client: connection established');
        elConnectionState.innerHTML = setWSConnectionState('connected');
    });

    websocket.onReconnecting(() => {
        console.info('WS Client: reconnecting');
        elConnectionState.innerHTML = setWSConnectionState('reconnecting');
    });

    websocket.onClose(() => {
        console.warn('WS Client: connection closed');
        elConnectionState.innerHTML = setWSConnectionState('disconnected');
    });

    websocket.onError((error) => {
        console.error(error);
        elConnectionState.innerHTML = setWSConnectionState('disconnected');
    });

    websocket.onReconnecting(() => {
        console.info('WS Chat: reconnecting');
        elConnectionState.innerHTML = setWSConnectionState('reconnecting');
    });

    websocket.onMessage(function (payload) {
        console.log(payload)
        let message = payload.data;
        if ('chat.message' === payload.command) {
            let msgUsername;
            if (username === message.username) {
                msgUsername = '<span class="text-primary">ME:</span> ';
            } else {
                msgUsername = `<span class="text-info">${message.username}:</span> `;
            }

            $elMessages.append(`
                <div class="list-group-item p-3">
                    <b>${msgUsername}</b> ${message.message.replaceAll('\n', '<b/>')}
                </div>
            `)
        }

        elMessages.scrollTo(0, elMessages.scrollHeight);
    });

    $('#formSendMessage').submit(function (event) {
        event.preventDefault();

        websocket.send('chat.message', {
            username: username,
            message: textareaMessage.value
        }).then(() => {
            textareaMessage.value = '';
        });
    })
}

