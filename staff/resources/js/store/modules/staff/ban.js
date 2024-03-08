import axios from "axios";
export default {
    state: {
        staffBans: []
    },
    mutations: {
        setStaffBans(state, payload)
        {
            state.staffBans = payload
        },
        addStaffBan(state, payload)
        {
            state.staffBans.push(payload)
        }
    },
    getters: {
        getStaffBans(state)
        {
            return state.staffBans
        }
    },
    actions: {
        getStaffBans(context)
        {
            axios.get('').then(response => {
                if (response.status === 200)
                {
                    context.commit('setStaffBans', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postStaffBan(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addStaffBan', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateStaffBan(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getStaffBans');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteStaffBan(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getStaffBans');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
