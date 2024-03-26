<template>
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
            <td> {{ staff.role.name }} </td>
            <td>
                <button type="button" class="btn btn-info" @click="showUpdateDialog(staff)">Информация</button>
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
            this.$router.push('/staffs/' + staff.id)
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
