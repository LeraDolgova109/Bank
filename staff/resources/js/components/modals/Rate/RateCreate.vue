<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Создание тарифа
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
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-primary" @click="createRate" style="margin-left: 3px;">Создать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "rate-create",
    props:{
        show: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            rate: {
                name: "",
                description: "",
                rate: 0
            }
        }
    },
    methods: {
        hideDialog()
        {
            this.$emit('update:show', false);
        },
        createRate()
        {
            this.$store.dispatch('postRate', this.rate);
            this.$emit('update:show', false);
        },
    }
}
</script>

<style scoped>
.dialog {
    margin-bottom: 5px;
}
</style>