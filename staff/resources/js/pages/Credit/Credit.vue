<template>
    <div class="container row">
        <div class="col-3">
            <navtab_2></navtab_2>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Кредиты</h3>
            <credit-table/>
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
        this.$store.dispatch('getCredits');
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
