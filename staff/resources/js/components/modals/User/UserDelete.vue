<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Удаление пользователя
            </div>
            <div class="card-body">
                <span>Подтвердите удаление пользователя
                    <span class="fw-bold">{{ fullName }}</span>
                </span>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-danger" @click="deleteCustomer" style="margin-left: 3px;">Удалить</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "user-delete",
    props:{
        show: {
            type: Boolean,
            default: false
        },
        user: {
            type: Object,
        },
        fullName: {
            type: String
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
        deleteCustomer()
        {
            this.$store.dispatch('deleteCustomer', this.customer.customer);
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
