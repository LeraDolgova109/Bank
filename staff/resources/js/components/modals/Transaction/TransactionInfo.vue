<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Операции
            </div>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Тип</th>
                <th scope="col">Статус</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дополнительная информация</th>
                <th scope="col">Время</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="transaction in transactions">
                <th scope="row">
                    {{ transaction.id }}
                </th>
                <td>{{ transaction.type }}</td>
                <td>{{ transaction.status }}</td>
                <td>{{ transaction.amount }}</td>
                <td>{{ transaction.add_info }}</td>
                <td>{{ transaction.success_datetime }}</td>
                </tr>
            </tbody>
        </table>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
            </div>
        </div>
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