// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true,
//     forceTLS: true,
// });

// window.Echo.channel('test-channel')
//     .listen('TestNotif', (e) => {
//         console.log(e.data.message);
//     });

import Echo from 'laravel-echo'

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: '9014dfc92725f31d00b6',
  cluster: 'us2',
  forceTLS: true
});

var channel = Echo.channel('test-channel');
channel.listen('.test-event', function(data) {
  alert(JSON.stringify(data));
});