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
        register(context, data)
        {
            const headers = {
                'Content-Type': 'application/json'
              }
            axios.post('/api/register', data, {
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
    }
}
