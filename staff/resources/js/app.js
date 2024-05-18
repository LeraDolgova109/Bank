import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router'
import store from './store/store'
import components from './components/index'
import firebase from 'firebase/compat/app';
import 'firebase/compat/messaging';
import firebaseConfig from './components/firebase/firebaseConfig.js';

const app = createApp(App);

components.forEach(component => {
    app.component(component.name, component)
})
firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging.getToken().then((token) => {
      console.log('Token: ' + token);
    });

  messaging.onMessage((payload) => {
    console.log('Message received:', payload);
  });

app
    .use(store)
    .use(router)
    .mount('#app');
