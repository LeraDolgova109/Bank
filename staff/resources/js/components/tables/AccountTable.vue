<template>
    <transaction-info v-model:show="dialogUpdate" v-model:account="selectedAccount"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">id Клиента</th>
            <th scope="col">Дата открытия</th>
            <th scope="col">Дата закрытия</th>
            <th scope="col">Статус</th>
            <th scope="col">Тип</th>
            <th scope="col">Баланс</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="account in accounts">
            <th scope="row">
                {{ account.id }}
            </th>
            <td>{{ account.customer_id }}</td>
            <td>{{ account.open_date }}</td>
            <td>{{ account.end_date }}</td>
            <td>{{ account.status }}</td>
            <td>{{ account.type.name }}</td>
            <td>{{ account.balance }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" @click="showUpdateDialog(customer)">Операции</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "account-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedAccount: null
        }
    },
    methods: {
        showUpdateDialog(account){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedAccount = account;
        },
        showDeleteDialog(account){
            this.dialogDelete = !this.dialogDelete;
            this.selectedAccount = account;
        },
    },
    computed: {
        accounts() {
            return this.$store.getters.getAccounts;
        }
    }
}
</script>

<style scoped>

</style>
