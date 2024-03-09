import axios from "axios";
export default {
    state: {
        roles: []
    },
    mutations: {
        setRoles(state, payload)
        {
            state.roles = payload
        },
        addRole(state, payload)
        {
            state.roles.push(payload)
        }
    },
    getters: {
        getRoles(state)
        {
            return state.roles
        }
    },
    actions: {
        getRoles(context)
        {
            axios.get('/api/roles')
            .then(response => {
                if (response.status === 200) {
                    console.log(response.data)
                    context.commit('setRoles', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postRole(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addRole', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateRole(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getRoles');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteRole(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getRoles');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
