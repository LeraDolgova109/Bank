<template>
    <div class="container row">
        <div class="col-3">
            <navtab_2></navtab_2>
            <router-view></router-view>
        </div>
        <div class="col-9">
            <h3>Тарифы</h3>
            <button type="button" class="btn btn-primary" @click="showDialog">Создать</button>
            <rate-create v-model:show="dialogCreate"/>
            <rate-table/>
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
        this.$store.dispatch('getDishes');
        this.$store.dispatch('getCategories');
        this.$store.dispatch('getMenus');
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
