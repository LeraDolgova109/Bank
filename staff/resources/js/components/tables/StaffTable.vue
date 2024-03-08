<template>
    <category-update v-model:show="dialogUpdate" v-model:category="selectedCategory"/>
    <category-delete v-model:show="dialogDelete" v-model:category="selectedCategory"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="category in categories">
            <th scope="row">
                {{ category.id }}
            </th>
            <td> {{ category.name }} </td>
            <td>
                <button type="button" class="btn btn-warning" @click="showUpdateDialog(category)">Изменить</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" @click="showDeleteDialog(category)">Удалить</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "staff-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedCategory: null
        }
    },
    methods: {
        showUpdateDialog(category){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedCategory = category;
        },
        showDeleteDialog(category){
            this.dialogDelete = !this.dialogDelete;
            this.selectedCategory = category;
        },
    },
    computed: {
        categories() {
            return this.$store.getters.getCategories;
        }
    }
}
</script>

<style scoped>
</style>
