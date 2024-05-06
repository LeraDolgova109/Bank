import axios from "axios";
import { generateKey } from "../../../components/helpers/keys";
export default {
    state: {
        banClient: {}
    },
    mutations: {
        setBanClient(state, payload)
        {
            state.banClient = payload
        },
        addStaffBan(state, payload)
        {
            state.staffBans.push(payload)
        }
    },
    getters: {
        getBanClient(state)
        {
            return state.banClient
        }
    },
    actions: {
        getBanClient(context, id)
        {
            axios.get('https://gate/api/ban/' + id, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    if (response.data.length == 0)
                    {
                        context.commit('setBanClient', {});
                        return;
                    }
                    response.data.forEach(element => {
                        if (element.role == 'customer')
                        {
                            context.commit('setBanClient', element);
                            return;
                        }
                        else
                        {
                            context.commit('setBanClient', {});
                        }
                    });   
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postBanClient(context, data)
        {
            axios.post('https://gate/api/ban', {
                "user_id":  data.customer.user_id,
                "reason": data.ban.reason,
                "end_time": data.ban.end_time,
                "role": "customer"
            }, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getBanClient', data.customer.user_id);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteBanClient(context, data)
        {
            axios.put('https://gate/api/unban/' + data.user_id, {
                "role": "customer"
            }, {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'Idempotency-key': generateKey()
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getBanClient');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
