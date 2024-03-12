<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">Сотрудник</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/">Главная</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/users">Пользователи</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/customers">Клиенты</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/staffs">Сотрудники</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/credits">Кредиты</router-link>
                    </li>
                </ul>
            </div>
            <b-navbar-nav class="ml-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-if="token == nullToken">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/login">Вход</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/register">Регистрация</router-link>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-else>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/logout">Выход</router-link>
                    </li>
                </ul>
            </b-navbar-nav>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'navbar',
    data()  {
        return {
            token: '',
            nullToken: 'expired',
        }
    },
    mounted() {
        if (localStorage.token) {
            this.token = localStorage.token;
        }
    }
}
</script>

<style scoped>

</style>