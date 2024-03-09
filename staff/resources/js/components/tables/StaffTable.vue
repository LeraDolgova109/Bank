<template>
    <staff-update v-model:show="dialogUpdate" v-model:staff="selectedStaff"/>
    <staff-delete v-model:show="dialogDelete" v-model:staff="selectedStaff"/>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">id Пользователя</th>
            <th scope="col">Должность</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="staff in staffs">
            <th scope="row">
                {{ staff.id }}
            </th>
            <td> {{ staff.user_id }} </td>
            <td> {{ staff.role[0].name }} </td>
            <td>
                <button type="button" class="btn btn-info" @click="showUpdateDialog(staff)">Детали</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" @click="showDeleteDialog(staff)">Удалить</button>
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
            selectedStaff: null
        }
    },
    methods: {
        showUpdateDialog(staff){
            this.dialogUpdate = !this.dialogUpdate;
            this.selectedStaff = staff;
        },
        showDeleteDialog(staff){
            this.dialogDelete = !this.dialogDelete;
            this.selectedStaff = staff;
        },
    },
    computed: {
        staffs() {
            return this.$store.getters.getStaffs;
        }
    }
}
</script>

<style scoped>
</style>
