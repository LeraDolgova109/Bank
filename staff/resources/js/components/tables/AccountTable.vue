<template>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Дата открытия</th>
            <th scope="col">Дата закрытия</th>
            <th scope="col">Статус</th>
            <th scope="col">Тип</th>
            <th scope="col">Баланс</th>
            <th scope="col">Видимость</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="account in accounts">
            <th scope="row">
                {{ account.id }}
            </th>
            <td>{{ account.open_date }}</td>
            <td>{{ account.end_date }}</td>
            <td>{{ account.status }}</td>
            <td>{{ account.type }}</td>
            <td>{{ account.balance }}</td>
            <td >
                <p v-if="compare(account)">Скрыт</p>
                <p v-else>Виден</p>
            </td>
            <td>
                <button type="button" class="btn btn-info btn-sm" @click="showUpdateDialog(account)">Операции</button>
                <button type="button" class="btn btn-light btn-sm" @click="hideAccount(account)">Видимость</button>
            </td>
            </tr>
        </tbody>
    </table>
    <transaction-info v-model:show="dialogUpdate" v-model:account="selectedAccount"/>
</template>

<script>
export default {
    name: "account-table",
    props:{
            accounts: {
                type: Array
            },
            hidden: {
                type: Array
            }
        },
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedAccount: null,
        }
    },
    methods: {
        hideAccount(account){
            this.$store.dispatch('hideAccount', account);
        },
        showUpdateDialog(account){
            this.$store.dispatch('getTransactions', account);
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedAccount = account;
        },
        compare(account) {
            let result = false;
            this.hidden.forEach(element => {
                if (element.account_id == account.id)
                    result = true;
            });
            return result;
        }
    },
}
</script>

<style scoped>

</style>
