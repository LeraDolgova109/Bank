<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Удаление клиента
            </div>
            <div class="card-body">
                <span>Подтвердите удаление клиента
                    <span class="fw-bold">{{ customer.fullName }}</span>
                </span>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-danger" @click="deleteCustomer" style="margin-left: 3px;">Удалить клиента</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "customer-delete",
    props:{
        show: {
            type: Boolean,
            default: false
        },
        customer: {
            type: Object,
            fullName: {
                type: String
            }
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
