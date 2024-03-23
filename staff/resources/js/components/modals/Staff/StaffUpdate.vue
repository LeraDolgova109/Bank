<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Блокировка сотрудника
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Причина</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput1" v-model="ban.reason"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Окончание времени</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" v-model="ban.end_time"/>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-warning" @click="updateStaff" style="margin-left: 3px;"  v-if="ban.id">Разблокировать</button>
                <button class="btn btn-warning" @click="deleteStaff" style="margin-left: 3px;"  v-else >Заблокировать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "staff-update",
        props:{
            show: {
                type: Boolean,
                default: false
            },
            staff: {
                type: Object,
            }
        },
        data() {
            return {
            }
        },
        methods: {
            hideDialog()
            {
                this.$emit('update:show', false);
            },
            updateStaff()
            {
                this.$store.dispatch('deleteBan', this.staff);
                this.$emit('update:show', false);
            },
            deleteStaff()
            {
                this.$store.dispatch('postBan', {'staff': this.staff, 'ban': this.ban});
                this.$emit('update:show', false);
            }
        },
        computed: {
            ban() {
                return this.$store.getters.getBan;
            }
        }
    }
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>