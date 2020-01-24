import axios from 'axios'
const state = {
    category:[]
};

const mutations = {
    SET_CATEGORY(state, items){
        state.category =items
    }
};

const getters = {
    getCategories(state){
        return state.category;
    }
};

const actions = {
    addTicketCategory(context, payload){
      axios.post('/api/ticketcat', payload)
           .then(res=>{
               console.log(res);
               context.commit('SET_CATEGORY', payload)
           }).catch((error)=>console.log(error))
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
