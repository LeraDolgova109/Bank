<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Создание пользователя
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Отчество</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Пол</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Дата рождения</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Место рождения</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Телефон</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Почта</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
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
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Номер</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Код подразделения</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Дата выдачи</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Кем выдан</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="customer.address"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-primary" @click="createCustomer" style="margin-left: 3px;">Создать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "user-create",
    props:{
        show: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            customer: {
                user: 1,
                address: ""
            }
        }
    },
    methods: {
        hideDialog()
        {
            this.$emit('update:show', false);
        },
        createCustomer()
        {
            this.$store.dispatch('postUser', this.customer);
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