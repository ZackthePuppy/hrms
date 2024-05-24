import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// import Echo from "laravel-echo";
// import Pusher from "pusher-js";

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: "9014dfc92725f31d00b6",
//     cluster: "us2",
//     encrypted: true,
//     forceTLS: true,
// });

// window.Echo.channel("test-channel").listen("TestNotif", (e) => {
//     console.log(e.data.message);
// });

// window.Echo.private(`App.Models.User.${userId}`).notification(
//     (notification) => {
//         console.log(notification);
//         // Handle the notification (e.g., show it in the UI)
//     },
// );

import Echo from 'laravel-echo';
 
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

window.Pusher = require('pusher-js'); 
window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    wssPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});