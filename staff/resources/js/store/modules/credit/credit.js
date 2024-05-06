import axios from "axios";
import { generateKey } from "../../../components/helpers/keys";
export default {
    state: {
        credits: [],
        credit: {},
        payments: [],
        rating: 0
    },
    mutations: {
        setCredits(state, payload)
        {
            state.credits = payload
        },
        setCredit(state, payload)
        {
            state.credit = payload
        },
        setPayments(state, payload)
        {
            state.payments = payload
        },
        setRating(state, payload)
        {
            state.rating = payload
        },
        addCredit(state, payload)
        {
            state.credits.push(payload)
        }
    },
    getters: {
        getCredits(state)
        {
            return state.credits
        },
        getCredit(state)
        {
            return state.credit
        },
        getPayments(state)
        {
            return state.payments
        },
        getRating(state)
        {
            return state.rating
        }
    },
    actions: {
        getCredits(context)
        {
            axios.get('https://gate/api/loan', {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setCredits', response.data.loans);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getCredit(context, id)
        {
            axios.get('https://gate/api/loan/' + id, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setCredit', response.data);
                    context.commit('setPayments', response.data.payments);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getCustomerCredits(context, id)
        {
            axios.get('https://gate/api/customer/' + id + '/loan', {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setCredits', response.data.loans);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getRating(context, id)
        {
            axios.get('https://gate/api/rating/' + id, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setRating', response.data.rating);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postCredit(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addCredit', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateCredit(context, data)
        {
            axios.put('https://gate/api/loan/' + data.id, {
                "customer_id": data.customer_id,
                "rate_id": data.rate.id,
                "amount": data.amount,
                "term": data.term,
                "status": data.status
            }, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getCredits');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteCredit(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getCredits');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
