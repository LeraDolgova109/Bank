<template>
    <menu-update v-model:show="dialogUpdate" v-model:menu="selectedMenu"/>
    <menu-delete v-model:show="dialogDelete" v-model:menu="selectedMenu"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Descritption</th>
            <th scope="col">Restaurant</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="menu in menus">
            <th scope="row">
                {{ menu.id }}
            </th>
            <td>{{ menu.name }}</td>
            <td>{{ menu.description }}</td>
            <td>{{ menu.restaurant_id }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "account-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedMenu: null
        }
    },
    methods: {
        showUpdateDialog(menu){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedMenu = menu;
        },
        showDeleteDialog(menu){
            this.dialogDelete = !this.dialogDelete;
            this.selectedMenu = menu;
        },
    },
    computed: {
        menus() {
            return this.$store.getters.getMenus;
        }
    }
}
</script>

<style scoped>

</style>
