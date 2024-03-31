import axios from "axios";
export default {
    state: {
        ban: {}
    },
    mutations: {
        setBan(state, payload)
        {
            state.ban = payload
        },
        addStaffBan(state, payload)
        {
            state.staffBans.push(payload)
        }
    },
    getters: {
        getBan(state)
        {
            return state.ban
        }
    },
    actions: {
        getBan(context, id)
        {
            axios.get('https://gate/api/ban/' + id,
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then(response => {
                if (response.status === 200)
                {
                    if (response.data.length == 0)
                    {
                        context.commit('setBan', {});
                        return;
                    }
                    response.data.forEach(element => {
                        if (element.role == 'staff')
                        {
                            context.commit('setBan', element);
                            return;
                        }
                        else
                        {
                            context.commit('setBan', {});
                        }
                    });   
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postBan(context, data)
        {
            axios.post('https://gate/api/ban', {
                "user_id":  data.staff.user_id,
                "reason": data.ban.reason,
                "end_time": data.ban.end_time,
                "role": "staff"
            },
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getBan');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteBan(context, data)
        {
            axios.put('https://gate/api/unban/' + data.user_id, {
                "role": "staff"
            },
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getBan');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
