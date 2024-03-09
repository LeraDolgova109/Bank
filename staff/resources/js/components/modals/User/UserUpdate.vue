<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Информация о пользователе
            </div>
            <div class="card-body">
                <div class="mb-3">Имя:
                    <span class="fw-bold">{{ fullName }}</span>
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
                <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Паспорт
                </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">id:
                            <span class="fw-bold">{{ user.passport.id }}</span>
                        </div>
                        <div class="mb-3">Серия:
                            <span class="fw-bold">{{ user.passport.series }}</span>
                        </div>
                        <div class="mb-3">Номер:
                            <span class="fw-bold">{{ user.passport.number }}</span>
                        </div>
                        <div class="mb-3">Код подразделения:
                            <span class="fw-bold">{{ user.passport.unitcode }}</span>
                        </div>
                        <div class="mb-3">Дата выдачи:
                            <span class="fw-bold">{{ user.passport.issue_date }}</span>
                        </div>
                        <div class="mb-3">Кем выдан:
                            <span class="fw-bold">{{ user.passport.issue_place }}</span>
                        </div>
                        <div class="mb-3">Место рождения:
                            <span class="fw-bold">{{ user.passport.residence_place }}</span>
                        </div>
                    </div>
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
    name: "user-update",
        props:{
            show: {
                type: Boolean,
                default: false
            },
            user: {
                type: Object,
            },
            fullName: {
                type: String
            }
        },
        data() {
            return {

            }
        },
        methods: {
            hideDialog()
            {
                this.$emit('update:show', false);
            },
            updateCustomer()
            {
                this.$store.dispatch('updateCustomer', this.customer.customer);
                this.$emit('update:show', false);
            }
        }
    }
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>