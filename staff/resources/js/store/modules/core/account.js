import axios from "axios";
export default {
    state: {
        accounts: [],
        hidden: []
    },
    mutations: {
        setAccounts(state, payload)
        {
            state.accounts = payload
        },
        setHidden(state, payload)
        {
            state.hidden = payload
        },
        addAccount(state, payload)
        {
            state.accounts.push(payload)
        }
    },
    getters: {
        getAccounts(state)
        {
            return state.accounts
        },
        getHidden(state)
        {
            return state.hidden
        }
    },
    actions: {
        getAccounts(context, data)
        {
            axios.get('https://gate/api/customer/' + data, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setAccounts', response.data.accounts);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getHidden(context)
        {
            axios.get('https://oauth/api/user',
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }
            ).then(response => {
                axios.get('/api/staffs/accounts/' + response.data,   
                {
                    headers: {
                        "Content-type": "application/json",
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(response => {
                    if (response.status === 200)
                    {
                        context.commit('setHidden', response.data);
                    }
                })
            }).catch(error => {
                console.log(error);
            })
        },
        hideAccount(context, data)
        {
            axios.get('https://oauth/api/user',
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }
            ).then(response => {
                axios.post('/api/staffs/hide/' + response.data, {
                        "account_id": data.id
                }, {
                    headers: {
                        "Content-type": "application/json",
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(response => {
                    if (response.status === 200)
                    {
                        context.dispatch('getHidden');
                    }
                })
            }).catch(error => {
                console.log(error);
            })
        },
        postAccount(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addAccount', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateAccount(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getAccounts');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteAccount(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getAccounts');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
