<template>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">id Пользователя</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="customer in customers">
            <th scope="row">
                <a class="link" @click="$router.push('/customers/'+customer.id)">
                    {{ customer.id }}
                </a>
            </th>
            <td>{{ customer.user_id }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" @click="$router.push('/customers/'+customer.id)">Счета</button>
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
            
        }
    },
    methods: {

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
