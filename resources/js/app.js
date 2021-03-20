import App from '@app/components/App'
import { createApp } from 'vue'

const app = createApp({
    created () {
        console.log('Frontend Booted 🚀');
    }
});

app.component('App', App)

const vm = app.mount('#app')