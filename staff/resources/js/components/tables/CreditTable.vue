<template>
    <!-- <transaction-info v-model:show="dialogUpdate" v-model:transactions="selectedCredit"/> -->
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">id Клиента</th>
            <th scope="col">Статус</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="credit in credits">
            <th scope="row">
                <a class="link" @click="$router.push('/credits/'+credit.id)">
                    {{ credit.id }}
                </a>
            </th>
            <td> {{ credit.customer_id }} </td>
            <td> {{ credit.status }} </td>
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
