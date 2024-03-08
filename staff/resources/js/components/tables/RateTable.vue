<template>
    <restaurant-update v-model:show="dialogUpdate" v-model:restaurant="selectedRestaurant"/>
    <restaurant-delete v-model:show="dialogDelete" v-model:restaurant="selectedRestaurant"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="restaurant in restaurants">
            <th scope="row">
                {{ restaurant.id }}
            </th>
            <td>{{ restaurant.name }}</td>
            <td>{{ restaurant.address }}</td>
            <td>
                <button type="button" class="btn btn-warning" @click="showUpdateDialog(restaurant)">Изменить</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" @click="showDeleteDialog(restaurant)">Удалить</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "rate-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedRestaurant: null
        }
    },
    methods: {
        showUpdateDialog(restaurant){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedRestaurant = restaurant;
        },
        showDeleteDialog(restaurant){
            this.dialogDelete = !this.dialogDelete;
            this.selectedRestaurant = restaurant;
        },
    },
    computed: {
        restaurants() {
            return this.$store.getters.getRestaurants;
        }
    }
}
</script>

<style scoped>
</style>
