import 'bootstrap';
import axios from 'axios';

// If using custom plugins or extensions in Alpine
import formProcessor from './alpine/components/form_processor';
import dateFormatter from './alpine/components/date_formatter';
import valueConverter from './alpine/components/value_converter';
import maskFormat from './alpine/components/mask';
import cep from './alpine/components/cep_component';
import formComponent from './alpine/components/form_component';
import ajaxComponent from './alpine/components/ajax_component';
import multiSelectComponent from './alpine/components/multi_select_component.js';
import statusFormatter from './alpine/components/status_formatter.js';

// Import Alpine.js
import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'

// Axios configuration
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Initialize Alpine.js
window.Alpine = Alpine;

// Register global components
window.formProcessor = formProcessor;
window.dateFormatter = dateFormatter;
window.valueConverter = valueConverter;
window.maskFormat = maskFormat;
window.cep = cep;
window.formComponent = formComponent;
window.ajaxComponent = ajaxComponent;
window.multiSelectComponent = multiSelectComponent;
window.statusFormatter = statusFormatter;

Alpine.plugin(mask)
Alpine.start();

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });