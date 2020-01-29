import axios from 'axios'

const state = {
    roles: []
};

const getters = {
    getRoles(state) {
        return state.roles
    }

};
const mutations = {
    SET_ROLES(state, roles) {
        state.roles = roles
    }
};

const actions = {
    getRoles(context) {
        axios.get('/api/roles/all')
            .then(r => {
                console.log(r)
                context.commit('SET_ROLES', r.data)
            }).catch(error => console.log(error))
    },
    addRole(context, payload) {
        axios.post('/api/roles/add', payload)
            .then(r => console.log(r.data))
            .catch(error => console.log(error))
    },
    assignPermission(context, payload) {
        axios.post('/api/roles/assign', {
            permId:payload.id,
            roleId:payload.roles
        })
            .then((r )=> console.log(r))
            .catch(error => console.log(error))
    }
};


export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
