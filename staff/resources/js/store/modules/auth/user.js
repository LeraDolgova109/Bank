import axios from "axios";
export default {
    state: {
        users: [],
    },
    mutations: {
        setUsers(state, payload)
        {
            state.users = payload
        },
        addUser(state, payload)
        {
            state.users.push(payload)
        }
    },
    getters: {
        getUsers(state)
        {
            return state.users
        }
    },
    actions: {
        getUsers(context)
        {
            axios.get('https://gate/api/users').then(response => {
                if (response.status === 200)
                {
                    context.commit('setUsers', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postUser(context, data)
        {
            const headers = {
                'Content-Type': 'application/json'
              }
            axios.post('https://gate/api/create', data, {
                headers: headers
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getUsers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateUser(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getUsers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteUser(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getUsers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
