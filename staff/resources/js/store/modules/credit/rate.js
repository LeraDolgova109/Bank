import axios from "axios";
export default {
    state: {
        rates: [{
            'id': 1,
            'name': 'Весенний',
            'rate': 20
        },
        {
            'id': 2,
            'name': 'Летний',
            'rate': 30
        }]
    },
    mutations: {
        setRates(state, payload)
        {
            state.rates = payload
        },
        addRate(state, payload)
        {
            state.rates.push(payload)
        }
    },
    getters: {
        getRates(state)
        {
            return state.rates
        }
    },
    actions: {
        getRates(context)
        {
            // axios.get('').then(response => {
            //     if (response.status === 200)
            //     {
            //         context.commit('setRates', response.data);
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
        },
        postRate(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addRate', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateRate(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getRates');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteRate(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getRates');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
