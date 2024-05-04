<template>
    <div class="container row">
        <div class="col-3">
            <navtab_1></navtab_1>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3 class="col-9">Клиент #{{ customer.id }}</h3>
            <div class="btn-group">
                <button type="button" class="btn btn-info" @click="showDialogUser">Пользователь</button>
                <button type="button" class="btn btn-warning" @click="showDialog">Блокировка</button>
            </div>
            <user-info v-model:show1="dialogUser"/>
            <customer-delete v-model:show="dialogUpdate" v-model:customer="customer"/>
            <h2 class="container">Счета</h2>
            <account-table v-model:accounts="accounts" v-model:hidden="hidden"/>
            <div class="container row justify-content-between">
                <h4 class="col-5">Кредиты</h4>
                <h4 class="col-2">
                    Кредитный рейтинг: 
                    <div v-if="rating> 50" class="text-success">{{ rating }}</div>
                    <div v-else class="text-danger">{{ rating }}</div>
                </h4>
            </div>
            <credit-table/>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            dialogUpdate: false,
            dialogUser: false,
            connection: null
        }
    },
    methods: {
        showDialog(){
            
        this.$store.dispatch('getBanClient', this.customer.user_id);
            this.dialogUpdate = !this.dialogUpdate;
        },
        showDialogUser(){
              this.$store.dispatch('getUserInfo', this.customer.user_id);
              this.dialogUser = !this.dialogUser;
        }
    },
    mounted() {
        this.$store.dispatch('getCustomer', this.$route.params.id);
        this.$store.dispatch('getRating', this.$route.params.id);
        this.$store.dispatch('getAccounts', this.$route.params.id);
        this.$store.dispatch('getHidden');
        this.$store.dispatch('getCustomerCredits', this.$route.params.id);
    },
    computed: {
        customer() {
            return this.$store.getters.getCustomer;
        },
        accounts() {
            return this.$store.getters.getAccounts;
        },
        hidden() {
            return this.$store.getters.getHidden;
        },
        rating() {
            return this.$store.getters.getRating;
        }
    },
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}

.btn-group {
    margin-top: 10px;
}
</style>
