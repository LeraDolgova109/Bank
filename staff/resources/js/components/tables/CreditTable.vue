<template>
    <transaction-info v-model:show="dialogUpdate" v-model:transactions="selectedCredit"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">id Пользователя</th>
            <th scope="col">Статус</th>
            <th scope="col">Дата открытия</th>
            <th scope="col">Дата закрытия</th>
            <th scope="col">Счёт</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="credit in credits">
            <th scope="row">
                {{ credit.id }}
            </th>
            <td> {{ credit.customer_id }} </td>
            <td> {{ credit.status }} </td>
            <td> {{ credit.open_date }} </td>
            <td> {{ credit.close_date }} </td>
            <td> {{ credit.account_id }} </td>
            <td>
                <button type="button" class="btn btn-info btn-sm" @click="showUpdateDialog(customer)">Операции</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "credit-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedCredit: null
        }
    },
    methods: {
        showUpdateDialog(credit){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedCredit = credit;
        },
        showDeleteDialog(credit){
            this.dialogDelete = !this.dialogDelete;
            this.selectedCredit = credit;
        },
    },
    computed: {
        credits() {
            return this.$store.getters.getCredits;
        }
    }
}
</script>

<style scoped>
</style>
