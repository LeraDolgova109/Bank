<template>
    <customer-update v-model:show="dialogUpdate" v-model:customer="selectedCustomer"/>
    <customer-delete v-model:show="dialogDelete" v-model:customer="selectedCustomer"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пол</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Почта</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="customer in customers">
            <th scope="row">
                {{ customer.id }}
            </th>
            <td>{{ customer.surname }}</td>
            <td>{{ customer.name }}</td>
            <td>{{ customer.patronymic }}</td>
            <td>{{ customer.gender }}</td>
            <td>{{ customer.birthdate }}</td>
            <td>{{ customer.email }}</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" @click="showUpdateDialog(customer)">Изменить</button>
            </td>
            <td>
                <button type="button" class="btn btn-success btn-sm" @click="showMenuDialog(customer)">Удалить</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "customer-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedCustomer: null
        }
    },
    methods: {
        showUpdateDialog(customer){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedCustomer = customer;
        },
        showDeleteDialog(customer){
            this.dialogDelete = !this.dialogDelete;
            this.selectedCustomer = customer;
        }
    },
    computed: {
        customers() {
            return this.$store.getters.getCustomers;
        }
    }
}
</script>

<style scoped>

</style>
