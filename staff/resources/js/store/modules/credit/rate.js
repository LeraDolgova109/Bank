import axios from "axios";
export default {
    state: {
        rates: []
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
            axios.get('https://gate/api/rate').then(response => {
                if (response.status === 200)
                {
                    context.commit('setRates', response.data.rates);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postRate(context, data)
        {
            axios.post('https://gate/api/rate', {
                'name': data.name,
                'description': data.description,
                'rate': data.rate
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getRates');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateRate(context, data)
        {
            axios.put('https://gate/api/rate/' + data.id, {
                'name': data.name,
                'description': data.description,
                'rate': data.rate,        
                "status": data.status,
                "start_date": data.start_date
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
            axios.delete('https://gate/api/rate/' + data.id
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
