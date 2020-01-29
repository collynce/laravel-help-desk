import axios from 'axios'

const state = {
    permissions:[]
};

const getters = {
    getPermission(state){
        return state.permissions
    }
};

const mutations = {
    SET_PERMISSIONS(state, permissions){
        state.permissions = permissions
    }
};

const actions = {
    getPermissions(context){
        axios.get('/api/permissions/all')
            .then(r=>{
                console.log(r);
                context.commit('SET_PERMISSIONS', r.data)
            })
            .catch(error=>{
                console.log(error)
            })
    },
    addPermission(context, payload) {
        axios.post('/api/permissions/add', payload)
            .then(r => {
                console.log(r.data)
            })
            .catch(error => {
                console.log(error)
            })
    }
};
export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
