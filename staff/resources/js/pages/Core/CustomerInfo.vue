<template>
    <div class="container row">
        <div class="col-3">
            <navtab_1></navtab_1>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Кредиты клиента</h3>
            <credit-table/>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            dialogCreate: false
        }
    },
    methods: {
        showDialog(){
            this.dialogCreate = !this.dialogCreate;
        }
    },
    mounted() {
        this.$store.dispatch('getCustomerCredits', this.$route.params.id);
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
