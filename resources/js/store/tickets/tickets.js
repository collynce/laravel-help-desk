import axios from 'axios'

const state = {
    tickets: [],
    singleTicket:[]
};

const getters = {
    getTickets(state) {
        return state.tickets;
    },
    getSingleTicket: (state) => (id) => {
        return state.tickets.find(item => item.id === id)
    }
};

const mutations = {
    SET_TICKETS(state, tickets) {
        state.tickets = tickets
    },
    SET_SINGLE_TICKETS(state, tickets) {
        state.singleTicket = tickets
    }
};
const actions = {
    createTicket(context, payload) {
        console.log(payload);
        axios.post('/tickets', payload)
            .then((res) => {
                console.log(res)
            }).catch((error) => console.log(error))
    },
   async showSingleTicketDetails(context, payload) {
     await axios.get('/api/ticket/details/' + payload).then(r =>{
            context.commit('SET_SINGLE_TICKETS', r.data)
        })
    },
    async getAllTickets(context) {
        return await axios.get('/tickets').then(r => {
            console.log(r);
            context.commit('SET_TICKETS', r.data);
        })
    },
    addComment(context, payload){
        axios.post('/api/tickets/comment', payload).then(r=>console.log(r))
    },
    deleteTicket(context, payload){
        console.log(payload);
        axios.post('/api/tickets/delete/'+payload)
            .then((r)=>{
            console.log(r)
        }).catch(er=>console.log(er))
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
