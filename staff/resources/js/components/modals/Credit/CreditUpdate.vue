<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Редактирование кредита
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Тариф</label>
                    <select class="form-select" aria-label="Default select example" v-model="credit.rate.id">
                        <option
                            v-for="rate in rates"
                            :key="rate.id"
                            :value="rate.id"
                        >
                            {{ rate.id + ". " + rate.name }}
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Сумма</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="credit.amount"></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Период</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="credit.term"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Статус</label>
                    <select class="form-select" name="pets" id="pet-select" v-model="credit.status">
                        <option value="approval">Утверждение</option>
                        <option value="rejected">Отклонён</option>
                        <option value="cancelled">Отменён</option>
                        <option value="approved">Подтверждён</option>
                        <option value="issued">Выдан</option>
                        <option value="in_process">В процессе</option>
                        <option value="closed">Закрыт</option>
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-warning" @click="updateCredit" style="margin-left: 3px;">Редактировать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "credit-update",
        props:{
            show: {
                type: Boolean,
                default: false
            },
            credit: {
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
            updateCredit()
            {
                this.$store.dispatch('updateCredit', this.credit);
                this.$emit('update:show', false);
            }
        },
        computed: {
            rates() {
                return this.$store.getters.getRates;
            },
        }
    }
</script>

<style scoped>
.dialog {
    margin-top: 10px;
}
</style>