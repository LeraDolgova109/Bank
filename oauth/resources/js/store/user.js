import axios from "axios";
export default {
    state: {
        users: [],
        user: {},
    },
    mutations: {
        setUsers(state, payload)
        {
            state.users = payload
        },
        setUser(state, payload)
        {
            state.user = payload
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
        },
        getUser(state)
        {
            return state.user
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
        getUserInfo(context, data)
        {
            axios.get('https://gate/api/users/' + data).then(response => {
                if (response.status === 200)
                {
                    context.commit('setUser', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        login(context, data)
        {
            const headers = {
                'Content-Type': 'application/json'
              }
            axios.post('/api/login', data, {
                headers: headers
            }).then(response => {
                if (response.status === 200)
                {
                    window.location.href = response.data;
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
