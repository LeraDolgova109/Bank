<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Создание пользователя
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.surname"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.name"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Отчество</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.patronymic"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Пол</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.gender"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Дата рождения</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" v-model="user.birthdate"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Место рождения</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.birthplace"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Телефон</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.phone"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" v-model="user.email"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" v-model="user.password"/>
                </div>
                <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Паспорт
                </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Серия</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="passport.series"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Номер</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="passport.number"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Код подразделения</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="passport.unitcode"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Дата выдачи</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" v-model="passport.issue_date"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Кем выдан</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="passport.issue_place"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-primary" @click="createUser" style="margin-left: 3px;">Создать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "register",
    props:{
        show: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            user: {
                'name': "",
                'surname': "",
                'patronymic': "",
                'email': "",
                'password': "",
                'phone': "",
                'birthdate': "",
                'birthplace': "",
                'gender': "",
                'password': "",
            },
            passport: {
                'series': "",
                'number': "",
                'unitcode': "",
                'issue_date': "",
                'issue_place': "",
            }
        }
    },
    methods: {
        hideDialog()
        {
            this.$emit('update:show', false);
        },
        createUser()
        {
            var userInfo = this.user;
            var passportInfo = this.passport;
            var data = {
                'name': userInfo.name,
                'surname': userInfo.surname,
                'patronymic': userInfo.patronymic,
                'email': userInfo.email,
                'password': userInfo.password,
                'phone': userInfo.phone,
                'birthdate': userInfo.birthdate,
                'birthplace': userInfo.birthplace,
                'gender': userInfo.gender,
                "passport": {
                    'series': passportInfo.series,
                    'number': passportInfo.number,
                    'unitcode': passportInfo.unitcode,
                    'issue_date': passportInfo.issue_date,
                    'issue_place': passportInfo.issue_place
                }
            };
            this.$store.dispatch('postUser', data);
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
    margin-bottom: 5px;
}
</style>