<template>
    <div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">id Транзакции</th>
            <th scope="col">Статус</th>
            <th scope="col">Сумма</th>
            <th scope="col">Дата</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="payment in payments">
            <td>{{ payment.transaction_id }}</td>
            <td v-if="payment.status=='expired'" class="fw-bold text-danger">Просрочен</td>
            <td v-else class="fw-bold text-success">Успешно</td>
            <td>{{ payment.amount }}</td>
            <td>{{ payment.date }}</td>
            </tr>
        </tbody>
        </table>
    </div>
</template>

<script>

export default {
    name: "payment-info",
    props:{

    },
    data() {
        return {

        }
    },
    methods: {

    },
    computed: {
        payments() {
            return this.$store.getters.getPayments;
        },
    }
}
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>