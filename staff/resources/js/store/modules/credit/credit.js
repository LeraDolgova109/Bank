import axios from "axios";
export default {
    state: {
        credits: [],
        credit: {}
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
        }
    },
    actions: {
        getCredits(context)
        {
            axios.get('https://gate/api/loan').then(response => {
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
            axios.get('https://gate/api/loan/' + id).then(response => {
                if (response.status === 200)
                {
                    context.commit('setCredit', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getCustomerCredits(context, id)
        {
            axios.get('https://gate/api/customer/' + id + '/loan').then(response => {
                if (response.status === 200)
                {
                    context.commit('setCredits', response.data.loans);
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
