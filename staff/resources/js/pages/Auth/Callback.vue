<template>
    <div class="container text-center">
        <h1 class="display-5">Переадресация ...</h1>
    </div>
</template>

<script>
export default {
    mounted(){
        localStorage.setItem('token', this.$route.params.id);
        window.location.href = "https://staff/#/";
        window.location.reload();
    }
}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
</style>
