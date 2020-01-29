import axios from 'axios'

const state = {
    users: []
}
const getters = {
    getUsers(state){
        return state.users;
    }
}
const mutations = {
    SET_USERS(state, users) {
        state.users = users
    }
}
const actions = {
    getAllUsers(context) {
        axios.get('/api/roles/allusers')
            .then((r)=>{
                console.log(r)
                context.commit('SET_USERS', r.data)
            }).catch()
    },
    assignRole(context, payload){
        console.log(payload);
        axios.post('/api/roles/assignuser', payload)
            .then((r)=>{
                console.log(r)
            })
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
