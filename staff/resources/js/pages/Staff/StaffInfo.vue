<template>
    <div class="container row">
        <div class="col-3">
        </div>
        <div class="col-9">
            <h3>Сотрудник #{{ staff.id }}</h3>
            <button type="button" class="btn btn-warning" @click="showDialog">Блокировка</button>
            <staff-update v-model:show="dialogUpdate" v-model:staff="staff"/>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            dialogUpdate: false,
        }
    },
    methods: {
        showDialog(){
            this.$store.dispatch('getBan', this.staff.user_id);
            this.dialogUpdate = !this.dialogUpdate;
        }
    },
    mounted() {
        this.$store.dispatch('getStaff', this.$route.params.id);
    },
    computed: {
        staff() {
            return this.$store.getters.getStaff;
        }
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
