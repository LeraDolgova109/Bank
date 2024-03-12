<template>
    <user-update v-model:show="dialogUpdate" v-model:user="selectedUser" v-model:fullName="selectedFullName"/>
    <user-delete v-model:show="dialogDelete" v-model:user="selectedUser" v-model:fullName="selectedFullName"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пол</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Почта</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users">
            <th scope="row">
                {{ user.id }}
            </th>
            <td>{{ user.surname }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.patronymic }}</td>
            <td>{{ user.gender }}</td>
            <td>{{ user.birthdate }}</td>
            <td>{{ user.email }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" @click="showUpdateDialog(user)">Детали</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" @click="showDeleteDialog(user)">Удалить</button>
            </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "user-table",
    data() {
        return {
            dialogUpdate: false,
            dialogDelete: false,
            selectedUser: null,
            selectedFullName: ""
        }
    },
    methods: {
        showUpdateDialog(user){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedUser = user;
            this.selectedFullName = user.surname + " " + user.name + " " + user.patronymic;
        },
        showDeleteDialog(user){
            this.dialogDelete = !this.dialogDelete;
            this.selectedUser = user;
            this.selectedFullName = user.surname + " " + user.name + " " + user.patronymic;
        }
    },
    computed: {
        users() {
            return this.$store.getters.getUsers;
        }
    }
}
</script>

<style scoped>

</style>
