import axios from "axios";
export default {
    state: {
        accounts: [{
            'id': 1,
            'customer_id': 1,
            'open_date': "01.01.2024",
            'end_date': "12.01.2024",
            'close_date': "13.01.2024",
            'status': "Закрыт",
            'type_id': 1,
            'type': {
                'name': 'Дебетовый'
            },
            'balance': 0,
        }]
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
        getAccounts(context)
        {
            // axios.get('').then(response => {
            //     if (response.status === 200)
            //     {
            //         context.commit('setAccounts', response.data);
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
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
