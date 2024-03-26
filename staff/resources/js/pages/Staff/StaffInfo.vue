<template>
    <div class="container row">
        <div class="col-3">
        </div>
        <div class="col-9">
            <h3>Сотрудник #{{ staff.id }}</h3>
            <div class="btn-group">
                <button type="button" class="btn btn-info" @click="showDialogUser">Пользователь</button>
                <button type="button" class="btn btn-warning" @click="showDialog">Блокировка</button>
            </div>
            <user-info v-model:show1="dialogUser"/>
            <staff-update v-model:show="dialogUpdate" v-model:staff="staff"/>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            dialogUpdate: false,
            dialogUser: false,
        }
    },
    methods: {
        showDialog(){
            this.$store.dispatch('getBan', this.staff.user_id);
            this.dialogUpdate = !this.dialogUpdate;
        },
        showDialogUser(){
              this.$store.dispatch('getUserInfo', this.staff.user_id);
              this.dialogUser = !this.dialogUser;
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
