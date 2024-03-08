import axios from "axios";
export default {
    state: {
        bans: []
    },
    mutations: {
        setBans(state, payload)
        {
            state.bans = payload
        },
        addBan(state, payload)
        {
            state.bans.push(payload)
        }
    },
    getters: {
        getBans(state)
        {
            return state.bans
        }
    },
    actions: {
        getBans(context)
        {
            axios.get('').then(response => {
                if (response.status === 200)
                {
                    context.commit('setBans', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        postBan(context, data)
        {
            axios.post('', {

            }).then(response => {
                if (response.status === 200)
                {
                    context.commit('addBan', response.data);
                }
            }).catch(error => {
                console.log(error);
            })
        },
        updateBan(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getBans');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteBan(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getBans');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
