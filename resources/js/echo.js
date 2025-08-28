import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY ?? '',

    // Use 127.0.0.1 for local Reverb
    wsHost: import.meta.env.VITE_REVERB_HOST ?? '127.0.0.1',
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 8081,

    // Don't use secure WebSocket (wss)
    wssPort: 443,
    forceTLS: false,

    // Enable only unsecure WebSocket transport
    enabledTransports: ['ws'],

    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
});