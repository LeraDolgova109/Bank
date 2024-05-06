import axios from "axios";
import Pusher from 'pusher-js';
import { generateKey } from "../../../components/helpers/keys";

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
        getTransactions(context, data)
        {
            const pusher = new Pusher('a173d1abb1760a1de4ae', { cluster: 'eu' });
            const channel = pusher.subscribe('account'+data.id);
            channel.bind('TransactionCreated', (data) => {
                data.model.amount /= 100; 
                context.commit('addTransaction', data.model);
                alert('New transaction with amount: ' + data.model.amount)
            });
            axios.get('https://gate/api/account/'+ data.id + '/transaction', {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setTransactions', response.data.transactions);
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
