<template>
    <div class="container">
        <h2>Настройки</h2>
        <div class="container line row">
            <p class="fs-5 col-8">Тема</p>
            <div class="dropdow col-4 md-3">
                    <select class="form-select" name="pets" id="pet-select" v-model="mode">
                        <option value="light">Светлая</option>
                        <option value="dark">Тёмная</option>
                    </select>
            </div>
        </div>
        <button type="button" class="btn btn-primary" @click="saveSettings">Сохранить</button>
        <button type="button" class="btn btn-info" @click="subscribe">Включить уведомления</button>
    </div>
</template>

<script>
import firebaseConfig from "../components/firebase/firebaseConfig";

export default {
    data() {
        return {
            mode: "light"
        }
    },
    methods: {
        saveSettings()
        {
            this.$store.dispatch('postSettings', this.mode);
        },
        subscribe()
        {
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/api/save_token',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
        }
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
.line {
    border-bottom: 1px solid #aaa;
}
.btn{
    margin-top: 10px;
}
</style>
