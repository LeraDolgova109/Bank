<template>
    <div class="container">
        <h2>Настройки</h2>
        <div class="container line row">
            <p class="fs-5 col-8">Тема</p>
            <div class="dropdow col-4">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Тема
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item">Светлая</a></li>
                    <li><a class="dropdown-item">Тёмная</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.container{
    margin-top: 30px;
}
.line {
    border-bottom: 1px solid #aaa;
}
</style>
