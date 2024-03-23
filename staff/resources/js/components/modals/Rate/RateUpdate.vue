<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Редактирование тарифа
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Название</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="rate.name"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput1" v-model="rate.description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Процент</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="rate.rate"/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Статус</label>
                    <select class="form-select" name="pets" id="pet-select" v-model="rate.status">
                        <option value="available">Доступный</option>
                        <option value="unavailable">Недоступный</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">Дата начала</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" v-model="rate.start_date"/>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-warning" @click="updateRate" style="margin-left: 3px;">Редактировать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "rate-update",
        props:{
            show: {
                type: Boolean,
                default: false
            },
            rate: {
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
            updateRate()
            {
                this.$store.dispatch('updateRate', this.rate);
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