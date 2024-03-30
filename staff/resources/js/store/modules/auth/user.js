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
        },
        getToken(state)
        {
            return localStorage.getItem('token');
        }
    },
    actions: {
        getUsers(context)
        {
            axios.get('https://gate/api/users', {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then(response => {
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
            axios.get('https://gate/api/users/' + data, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setUser', response.data);
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
        login(context)
        {
            window.location.href = "https://oauth/#/staff";
        },
        logout(context)
        {
            axios.post('https://oauth/api/logout', {},
                {
                    headers: {
                        "Content-type": "application/json",
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                }
            )
            .then(response => {
                if (response.status === 200)
                {
                    localStorage.setItem('token', 'expired');
                    window.location.href = "https://staff/#/";
                    window.location.reload();
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
