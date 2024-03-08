import axios from "axios";
export default {
    state: {
        customers: []
    },
    mutations: {
        setCustomers(state, payload)
        {
            state.customers = payload
        },
        addCustomer(state, payload)
        {
            state.customers.push(payload)
        }
    },
    getters: {
        getCustomers(state)
        {
            return state.customers
        }
    },
    actions: {
        getCustomers(context)
        {
            axios.get('').then(response => {
                if (response.status === 200)
                {
                    context.commit('setCustomers', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postCustomer(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addCustomer', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateCustomer(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getCustomers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteCustomer(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getCustomers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
