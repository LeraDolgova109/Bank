import { initializeApp } from "firebase/app";
import { getMessaging, getToken, onMessage } from "firebase/messaging";


export default function (){
    const firebaseConfig = {
        apiKey: "AIzaSyAikfy8kzm7jVWZWCgWmsgOsV0KfH5tm54",
        authDomain: "bank-a2238.firebaseapp.com",
        projectId: "bank-a2238",
        storageBucket: "bank-a2238.appspot.com",
        messagingSenderId: "662573392043",
        appId: "1:662573392043:web:40eb18d4bd6ad25918d7ee"
      };

    const app = initializeApp(firebaseConfig);

    const messaging = getMessaging();
    onMessage(messaging, (payload) => {
    console.log('Message received. ', payload);
    });

    getToken(messaging, { vapidKey: 'BGOnZOYrXrqZM8Koly9i6hdOqL7dd0kzSta6sGshAoe8BW_xWDi9nIy6R45l-YeMZjjX0HRkf1fFsyLQJ35uTZY' })
        .then((currentToken) => {
        if (currentToken) {
            console.log("Token is:",currentToken);

        } else {
            console.log('No registration token available. Request permission to generate one.');
        }
        }).catch((err) => {
    console.log('An error occurred while retrieving token. ', err);
    });
}