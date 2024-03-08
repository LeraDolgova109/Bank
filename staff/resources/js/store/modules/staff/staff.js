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
            axios.get('').then(response => {
                if (response.status === 200)
                {
                    context.commit('setStaffs', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postStaff(context, data)
        {
            axios.post('', {

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
            axios.delete('' + data.id
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
