<template>
    <div class="container row">
        <div class="col-3">
            <navtab_1></navtab_1>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Счета</h3>
            <account-table/>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            
        }
    },
    methods: {
       
    },
    mounted() {
        this.$store.dispatch('getCategories');
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
