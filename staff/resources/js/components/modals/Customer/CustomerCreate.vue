<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Создание клиента
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Пользователь</label>
                    <select class="form-select" aria-label="Default select example" v-model="customer.user">
                        <option
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                        >
                                {{ user.id + ". " + user.surname + " " + user.name + " " + user.patronymic}}
                        </option>
                    </select>
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
    name: "customer-create",
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
            this.$store.dispatch('postCustomer', this.customer);
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