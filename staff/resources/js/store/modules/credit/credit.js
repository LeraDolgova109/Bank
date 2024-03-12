import axios from "axios";
export default {
    state: {
        credits: [{
            'id': 1,
            'customer_id': 1,
            'status': 'Закрыт',
            'open_date': '01.01.2024',
            'close_date': '02.01.2024',
            'account_id': 1
        }]
    },
    mutations: {
        setCredits(state, payload)
        {
            state.credits = payload
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
        }
    },
    actions: {
        getCredits(context)
        {
            // axios.get('').then(response => {
            //     if (response.status === 200)
            //     {
            //         context.commit('setCredits', response.data);
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
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
            axios.put('' + data.id, {
                
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
