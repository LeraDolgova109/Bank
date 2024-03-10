<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Редактирование сотрудника
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Блокировка</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="staff.is_banned"/>
                </div>
                <div class="mb-3" v-if='staff.is_banned==1'>
                    <label for="exampleFormControlInput1" class="form-label">Причина</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="staff.ban.reason"/>
                </div>
                <div class="mb-3" v-if='staff.is_banned==1'>
                    <label for="exampleFormControlInput1" class="form-label">Окочнание времени</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="staff.ban.end_time"/>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-warning" @click="updateCustomer" style="margin-left: 3px;">Редактировать</button>
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
            updateCustomer()
            {
                this.$store.dispatch('updateCustomer', this.customer.customer);
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