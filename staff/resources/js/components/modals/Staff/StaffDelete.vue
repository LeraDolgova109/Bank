<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Блокировка сотрудника #{{ staff.id }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Причина</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput1" v-model="ban.reason"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Окочнание времени</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" v-model="ban.end_time"/>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-danger" @click="deleteStaff" style="margin-left: 3px;">Заблокировать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "staff-delete",
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
            ban: {
                reason: '',
                end_time: ''
            }
        }
    },
    methods: {
        hideDialog()
        {
            this.$emit('update:show', false);
        },
        deleteStaff()
        {
            this.$store.dispatch('postStaffBan', {'staff': this.staff, 'ban': this.ban});
            this.$emit('update:show', false);
        }
    }
}
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>
