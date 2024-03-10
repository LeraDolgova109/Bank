<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Редактирование сотрудника
            </div>
            <div class="card-body">
                <div class="mb-3">Статус:
                    <span class="fw-bold">Заблокирован</span>
                </div>
                <div class="mb-3">Причина:
                    <span class="fw-bold">{{ staff.ban.reason }}</span>
                </div>
                <div class="mb-3">Окочнание времени:
                    <span class="fw-bold">{{ staff.ban.end_time }}</span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-warning" @click="updateStaff" style="margin-left: 3px;">Разблокировать</button>
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
            staff:{
                type: Object
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
                this.$store.dispatch('deleteStaffBan', this.staff);
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