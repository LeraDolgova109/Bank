<template>
    <rate-update v-model:show="dialogUpdate" v-model:rate="selectedRate"/>
    <rate-delete v-model:show="dialogDelete" v-model:rate="selectedRate"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Процент</th>
            <th scope="col">Дата начала</th>
            <th scope="col">Дата окончания</th>
            <th scope="col">Статус</th>
            <th scope="col">Количество кредитов</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="rate in rates">
            <th scope="row">
                {{ rate.id }}
            </th>
            <td>{{ rate.name }}</td>
            <td>{{ rate.description }}</td>
            <td>{{ rate.rate }}</td>
            <td>{{ rate.start_date }}</td>
            <td>{{ rate.end_date }}</td>
            <td>{{ rate.status }}</td>
            <td>{{ rate.count_loans }}</td>
            <td>
                <button type="button" class="btn btn-warning" @click="showUpdateDialog(rate)">Изменить</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" @click="showDeleteDialog(rate)">Удалить</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "rate-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedRate: null
        }
    },
    methods: {
        showUpdateDialog(rate){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedRate = rate;
        },
        showDeleteDialog(rate){
            this.dialogDelete = !this.dialogDelete;
            this.selectedRate = rate;
        },
    },
    computed: {
        rates() {
            return this.$store.getters.getRates;
        }
    }
}
</script>

<style scoped>
</style>
