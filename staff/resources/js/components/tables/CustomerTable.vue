<template>
    <customer-update v-model:show="dialogUpdate" v-model:customer="selectedCustomer"/>
    <customer-delete v-model:show="dialogDelete" v-model:customer="selectedCustomer"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">id Пользователя</th>
            <th scope="col">Заблокирован</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="customer in customers">
            <th scope="row">
                {{ customer.id }}
            </th>
            <td>{{ customer.user_id }}</td>
            <td>{{ customer.is_banned }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" @click="showUpdateDialog(customer)">Детали</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" @click="showMenuDialog(customer)">Удалить</button>
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
