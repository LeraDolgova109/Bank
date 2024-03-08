<template>
    <div class="container row">
        <div class="col-3">

        </div>
        <div class="col-9">
            <h3>Пользователи</h3>
            <button type="button" class="btn btn-primary" @click="showDialog">Создать</button>
            <user-create v-model:show="dialogCreate"/>
            <user-table/>
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
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
