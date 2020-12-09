import { createApp } from 'vue'
import App from './views/App.vue'
import router from './router/index'
import store from './store/index'
import "animate.css"


createApp(App).use(store).use(router).mount('#app');

