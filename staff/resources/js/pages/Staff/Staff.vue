<template>
    <div class="container row">
        <div class="col-3">
        </div>
        <div class="col-9">
            <h3>Сотрудники</h3>
            <button type="button" class="btn btn-primary" @click="showDialog">Создать</button>
            <staff-create v-model:show="dialogCreate"/>
            <staff-table/>
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
        this.$store.dispatch('getStaffs');
        this.$store.dispatch('getRoles');
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
