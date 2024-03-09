import axios from "axios";
export default {
    state: {
        users: [{
            'id': 1,
            'name': 'Иван',
            'surname': 'Иванов',
            'patronymic': 'Иванович',
            'gender': 'мужской',
            'birthdate': '01.01.2000',
            'birthplace': 'Россия',
            'phone': '+123456789',
            'confirm_phone': true,
            'passport_id': 1,
            'passport': {
                'id': 1,
                'series': '0000',
                'number': '123456',
                'unitcode': '123-123',
                'issue_date': '12.12.1999',
                'issue_place': 'УМВД',
                'residence_place': 'Томск'
            },
            'email': 'qwerty',
            'password': '1111',
        }],
    },
    mutations: {
        setUsers(state, payload)
        {
            state.users = payload
        },
        addUser(state, payload)
        {
            state.users.push(payload)
        }
    },
    getters: {
        getUsers(state)
        {
            return state.users
        }
    },
    actions: {
        getUsers(context)
        {
            // axios.get('').then(response => {
            //     if (response.status === 200)
            //     {
            //         context.commit('setUsers', response.data);
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
        },
        postUser(context, data)
        {
            context.commit('addUser', data);
            // axios.post('', {

            // }).then(response => {
            //     if (response.status === 200)
            //     {
            //         context.commit('addUser', response.data);
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
        },
        updateUser(context, data)
        {
            axios.put('' + data.id, {
                
            }).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getUsers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
        deleteUser(context, data)
        {
            axios.delete('' + data.id
            ).then(response => {
                if (response.status === 200)
                {
                    context.dispatch('getUsers');
                }
            }).catch(error => {
                console.log(error);
            })
        },
    }
}
