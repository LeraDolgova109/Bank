<template>
    <div class="container row">
        <div class="col-3">
            <navtab_1></navtab_1>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Клиенты</h3>
            <button type="button" class="btn btn-primary" @click="showDialog">Создать</button>
            <customer-create v-model:show="dialogCreate"/>
            <customer-table/>
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
        this.$store.dispatch('getUsers');
        this.$store.dispatch('getCustomers');
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
