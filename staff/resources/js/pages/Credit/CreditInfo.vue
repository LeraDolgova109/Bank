<template>
    <div class="container row">
        <div class="col-3">
            <navtab_2></navtab_2>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Кредит #{{ credit.id }}</h3>
            <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">id Клиента</p>
                    <div>{{ credit.customer_id }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Сумма</p>
                    <div>{{ credit.amount }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Статус</p>
                    <div>{{ credit.status }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Дата</p>
                    <div>{{ credit.issue_date }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Дата закрытия</p>
                    <div>{{ credit.close_date }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Счёт зачисления</p>
                    <div>{{ credit.issuance_account }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Счёт возврата</p>
                    <div>{{ credit.repayment_account }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Срок</p>
                    <div>{{ credit.term }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <p class="fw-bold">Минимальная выплата</p>
                    <div>{{ credit.min_payment }}</div>
                </li>
            </ul>
            </div>
            <button type="button" class="btn btn-warning" @click="showUpdateDialog(credit)">Изменить</button>
            <credit-update v-model:show="dialogUpdate" v-model:credit="selectedCredit"/>
            <h2>Платежи по кредиту</h2>
            <payment-info></payment-info>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            dialogUpdate: false,
            selectedCredit: null
        }
    },
    methods: {
        showUpdateDialog(credit){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedCredit = credit;
        },
    },
    mounted() {
        this.$store.dispatch('getCredit', this.$route.params.id);
        this.$store.dispatch('getRates');
    },
    computed: {
        credit() {
            return this.$store.getters.getCredit;
        }
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}

#card{
    margin-top: 10px;
}

button{
    margin-top: 10px;
}

credit-update{
    margin-top: 10px;
}

h2{
    margin-top: 10px;
}
</style>
