import axios from "axios";
export default {
    state: {
        transactions: []
    },
    mutations: {
        setTransactions(state, payload)
        {
            state.transactions = payload
        },
        addTransaction(state, payload)
        {
            state.transactions.push(payload)
        }
    },
    getters: {
        getTransactions(state)
        {
            return state.transactions
        }
    },
    actions: {
        getTransactions(context)
        {
            axios.get('').then(response => {
                if (response.status === 200)
                {
                    context.commit('setTransactions', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postTransaction(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addTransaction', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateTransaction(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getTransactions');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteTransaction(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getTransactions');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
