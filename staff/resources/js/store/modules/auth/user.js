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
            context.commit('addUser', data);
            // axios.post('', {

            // }).then(response => {
            //     if (response.status === 200)
            //     {
            //         context.commit('addUser', response.data);
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
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
