<template>
    <div class="container text-center">
        <h1 class="display-5">Это веб клиент для сотрудника</h1>
        <currency-table></currency-table>
    </div>
</template>

<script>
export default {
    mounted() {
        this.$store.dispatch('getCurrency');
    },
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
