<template>
    <div class="dialog container" v-if="show === true" >
        <div class="card" style="width: 35rem;">
            <div class="card-header">
                Создание сотрудника
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Пользователь</label>
                    <select class="form-select" aria-label="Default select example" v-model="staff.user">
                        <option
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                        >
                            {{ user.id + ". " + user.surname + " " + user.name + " " + user.patronymic}}
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Роль</label>
                    <select class="form-select" aria-label="Default select example" v-model="staff.role">
                        <option
                            v-for="role in roles"
                            :key="role.id"
                            :value="role.id"
                        >
                                {{ role.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" @click="hideDialog">Закрыть</button>
                <button class="btn btn-primary" @click="createStaff" style="margin-left: 3px;">Создать</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "staff-create",
    props:{
        show: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            staff: {
                user: 1,
                role: 1
            }
        }
    },
    methods: {
        hideDialog()
        {
            this.$emit('update:show', false);
        },
        createStaff()
        {
            this.$store.dispatch('postStaff', this.staff);
            this.$emit('update:show', false);
        },
    },
    computed: {
        users() {
            return this.$store.getters.getUsers;
        },
        roles() {
            return this.$store.getters.getRoles;
        },
    }
}
</script>

<style scoped>
.dialog {
    margin-bottom: 5px;
}
</style>