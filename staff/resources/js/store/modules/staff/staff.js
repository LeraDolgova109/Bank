import axios from "axios";
export default {
    state: {
        staffs: [],
        staff: {},
        mode: "light"
    },
    mutations: {
        setStaffs(state, payload)
        {
            state.staffs = payload
        },
        setStaff(state, payload)
        {
            state.staff = payload
        },
        setSettings(state, payload)
        {
            state.mode = payload
        },
        addStaff(state, payload)
        {
            state.staffs.push(payload)
        }
    },
    getters: {
        getStaffs(state)
        {
            return state.staffs
        },
        getStaff(state)
        {
            return state.staff
        },
        getSettings(state)
        {
            return state.mode
        }
    },
    actions: {
        getStaffs(context)
        {
            axios.get('/api/staffs')
            .then(response => {
                if (response.status === 200) {
                    context.commit('setStaffs', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        getStaff(context, id)
        {
            axios.get('/api/staffs/' + id)
            .then(response => {
                if (response.status === 200) {
                    context.commit('setStaff', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postStaff(context, data)
        {
            axios.post('/api/staffs', {
                'user_id': data.user,
                'role_id': data.role
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getStaffs');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateStaff(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getStaffs');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteStaff(context, data)
        {
            axios.delete('/api/staffs/' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getStaffs');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        settings(context)
        {
            axios.get('https://oauth/api/user',
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }
            ).then(response => {
                if (response.status === 200)
                {
                    axios.get('/api/staffs/settings/' + response.data,
                    
                ).then(response => {
                    if (response.status === 200)
                    {
                        context.commit('setSettings', response.data.mode);
                    }
                })
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postSettings(context, data)
        {
            axios.get('https://oauth/api/user',
            {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }
            ).then(response => {
                if (response.status === 200)
                {
                    axios.post('/api/staffs/settings/' + response.data,
                {
                    "mode": data
                } 
                ).then(response => {
                    if (response.status === 200)
                    {
                        context.commit('setSettings', response.data.mode);
                    }
                })
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
