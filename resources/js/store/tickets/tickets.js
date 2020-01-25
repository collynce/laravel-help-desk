import axios from 'axios'
const state ={

};

const mutations = {

};
const actions = {
    createTicket(context, payload){
        console.log(payload);
        axios.post('/api/tickets', payload)
            .then((res)=>{
                console.log(res)
            }).catch((error)=>console.log(error))
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
}
