import axios from "axios";
import { generateKey } from "../../../components/helpers/keys";
export default {
    state: {
        customers: [],
        customer: {}
    },
    mutations: {
        setCustomers(state, payload)
        {
            state.customers = payload
        },
        setCustomer(state, payload)
        {
            state.customer = payload
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
        },
        getCustomer(state)
        {
            return state.customer
        }
    },
    actions: {
        getCustomers(context)
        {
            axios.get('https://gate/api/customer', {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setCustomers', response.data.customers);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getCustomer(context, id)
        {
            axios.get('https://gate/api/customer/' + id, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('setCustomer', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postCustomer(context, data)
        {
            axios.post('https://gate/api/customer', {
                "user_id": data.user.toString()
            }, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getCustomers');
                }
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
