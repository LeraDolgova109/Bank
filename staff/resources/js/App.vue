<template>
    <div class="app">
        <navbar v-if="mode=='light'"></navbar>
        <navbar-dark v-else></navbar-dark>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    mounted(){
        this.$store.dispatch('settings');
    },
    computed: {
        mode() {
            return this.$store.getters.getSettings;
        }
    }
}
</script>

<style scoped>

</style>
