<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Информация о клиенте
            </div>
            <div class="card-body">
                <account-table v-model:accounts="accounts"/>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "customer-update",
        props:{
            show: {
                type: Boolean,
                default: false
            },
            customer: {
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
        },
        computed: {
            accounts() {
                return this.$store.getters.getAccounts;
            }
        }
    }
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>