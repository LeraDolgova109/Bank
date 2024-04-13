<template>
    <div class="dialog row justify-content-md-center">
    <div class="card col-md-auto" style="width: 35rem;">
        <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Валюта</th>
                <th scope="col">Курс</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="currency in currencies">
                <td>{{ currency.name }}</td>
                <td>{{ currency.rate }}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: "currency-table",
    methods: {

    },
    computed: {
        currencies() {
            return this.$store.getters.getCurrency;
        }
    }
}
</script>

<style scoped>

.card{
    margin-top: 30px;
}
</style>
