<template>
    <div v-if="show === true">
        <h4 class="bold">Операции акаунта #{{ account.id }}</h4>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Тип</th>
            <th scope="col">Статус</th>
            <th scope="col">Сумма</th>
            <th scope="col">Дополнительная информация</th>
            <th scope="col">Время</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="transaction in transactions">
            <td>{{ transaction.type }}</td>
            <td>{{ transaction.status }}</td>
            <td>{{ transaction.amount }}</td>
            <td>{{ transaction.add_info }}</td>
            <td>{{ transaction.success_datetime }}</td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "transaction-info",
        props:{
            show: {
                type: Boolean,
                default: false
            },
            account: {
                type: Object
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
        },
        computed: {
            transactions() {
                return this.$store.getters.getTransactions;
            },
        }
        
    }
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>