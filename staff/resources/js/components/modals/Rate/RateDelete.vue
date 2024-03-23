<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Удалить тариф
            </div>
            <div class="card-body">
                <span>Подтвердите удаление тарифа
                    <span class="fw-bold">{{ rate.name }}</span>
                </span>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-danger" @click="deleteRate" style="margin-left: 3px;">Удалить</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "rate-delete",
    props:{
        show: {
            type: Boolean,
            default: false
        },
        rate: {
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
        deleteRate()
        {
            this.$store.dispatch('deleteRate', this.rate);
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
