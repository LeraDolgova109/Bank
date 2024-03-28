import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router'
import store from './store/store'
import components from './components/index'

const app = createApp(App);

components.forEach(component => {
    app.component(component.name, component)
})

app
    .use(store)
    .use(router)
    .mount('#app');
