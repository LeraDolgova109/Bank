<template>
    <div class="dialog container" v-if="show1 === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Информация о пользователе
            </div>
            <div class="card-body">
                <div class="mb-3">Фамилия:
                    <span class="fw-bold">{{ user.surname }}</span>
                </div>
                <div class="mb-3">Имя:
                    <span class="fw-bold">{{ user.name }}</span>
                </div>
                <div class="mb-3">Отчество:
                    <span class="fw-bold">{{ user.patronymic }}</span>
                </div>
                <div class="mb-3">Пол:
                    <span class="fw-bold">{{ user.gender }}</span>
                </div>
                <div class="mb-3">Дата рождения:
                    <span class="fw-bold">{{ user.birthdate }}</span>
                </div>
                <div class="mb-3">Место рождения:
                    <span class="fw-bold">{{ user.birthplace }}</span>
                </div>
                <div class="mb-3">Телефон:
                    <span class="fw-bold">{{ user.phone }}</span>
                </div>
                <div class="mb-3">Email:
                    <span class="fw-bold">{{ user.email }}</span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
            </div>
        </div>
    </div>
</template>

<script>
import user from '../../../store/modules/auth/user';

export default {
    name: "user-info",
        props:{
            show1: {
                type: Boolean,
                default: false
            },
        },
        data() {
            return {

            }
        },
        methods: {
            hideDialog()
            {
                this.$emit('update:show1', false);
            },
        },
        computed: {
            user()
            {
                return this.$store.getters.getUser;
            }
        }
    }
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>