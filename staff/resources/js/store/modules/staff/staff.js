import axios from "axios";
export default {
    state: {
        staffs: []
    },
    mutations: {
        setStaffs(state, payload)
        {
            state.staffs = payload
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
        }
    },
    actions: {
        getStaffs(context)
        {
            axios.get('/api/staffs')
            .then(response => {
                if (response.status === 200) {
                    console.log(response.data)
                    context.commit('setStaffs', response.data);
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
                    context.commit('addStaff', response.data);
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
    }
}
