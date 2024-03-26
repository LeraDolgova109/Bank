import axios from "axios";
export default {
    state: {
        accounts: []
    },
    mutations: {
        setAccounts(state, payload)
        {
            state.accounts = payload
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
        }
    },
    actions: {
        getAccounts(context, data)
        {
            axios.get('https://gate/api/customer/' + data).then(response => {
                if (response.status === 200)
                {
                    context.commit('setAccounts', response.data.accounts);
                }
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
