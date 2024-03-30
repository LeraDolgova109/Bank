<template>
    <div class="container">
        <h2>Настройки</h2>
        <div class="container line row">
            <p class="fs-5 col-8">Тема</p>
            <div class="dropdow col-4 md-3">
                    <select class="form-select" name="pets" id="pet-select" v-model="mode">
                        <option value="light">Светлая</option>
                        <option value="dark">Тёмная</option>
                    </select>
            </div>
        </div>
        <button type="button" class="btn btn-primary" @click="saveSettings">Сохранить</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            mode: "light"
        }
    },
    methods: {
        saveSettings()
        {
            this.$store.dispatch('postSettings', this.mode);
        },
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
.line {
    border-bottom: 1px solid #aaa;
}
.btn{
    margin-top: 10px;
}
</style>
