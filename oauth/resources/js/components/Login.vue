<template>
    <div class="dialog row justify-content-md-center">
        <div class="card col-md-auto" style="width: 35rem;">
            <div class="card-header">
               Вход
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" v-model="user.email"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" v-model="user.password"/>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary">Закрыть</button>
                <button class="btn btn-primary" @click="createUser" style="margin-left: 3px;">Войти</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "login",
    data() {
        return {
            user: {
                'email': "",
                'password': "",
            },
        }
    },
    methods: {
        createUser()
        {
            var user = this.user;
            var data = {
                'client': 'staff',
                'email': user.email,
                'password': user.password
            };
            this.$store.dispatch('login', data);
            this.$emit('update:show', false);
        },
    },
    computed: {
        users() {
            return this.$store.getters.getUsers;
        },
    }
}
</script>

<style scoped>
.dialog {
    margin-top: 30px;
    margin-bottom: 5px;
}
</style>