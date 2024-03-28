<template>
    <div class="container text-center">
        <h1 class="display-5">Переадресация ...</h1>
    </div>
</template>

<script>
export default {
    mounted(){
        this.$store.dispatch('logout');
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
