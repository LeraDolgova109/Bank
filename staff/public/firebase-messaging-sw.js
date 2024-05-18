importScripts('https://www.gstatic.com/firebasejs/9.1.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/9.1.1/firebase-messaging.js');

const firebaseConfig = {
    apiKey: "AIzaSyAikfy8kzm7jVWZWCgWmsgOsV0KfH5tm54",
    authDomain: "bank-a2238.firebaseapp.com",
    projectId: "bank-a2238",
    storageBucket: "bank-a2238.appspot.com",
    messagingSenderId: "662573392043",
    appId: "1:662573392043:web:40eb18d4bd6ad25918d7ee"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
    body: payload.notification.body
};

self.registration.showNotification(notificationTitle, notificationOptions);
});