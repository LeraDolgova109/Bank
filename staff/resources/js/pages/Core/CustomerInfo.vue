<template>
    <div class="container row">
        <div class="col-3">
            <navtab_1></navtab_1>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Клиент #{{ customer.id }}</h3>
            <button type="button" class="btn btn-warning" @click="showDialog">Блокировка</button>
            <customer-delete v-model:show="dialogUpdate" v-model:customer="customer"/>
            <h2>Кредиты</h2>
            <credit-table/>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            dialogUpdate: false
        }
    },
    methods: {
        showDialog(){
            this.dialogUpdate = !this.dialogUpdate;
        }
    },
    mounted() {
        this.$store.dispatch('getCustomer', this.$route.params.id);
        this.$store.dispatch('getBanClient', this.$route.params.id);
        this.$store.dispatch('getCustomerCredits', this.$route.params.id);
    },
    computed: {
        customer() {
            return this.$store.getters.getCustomer;
        }
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
