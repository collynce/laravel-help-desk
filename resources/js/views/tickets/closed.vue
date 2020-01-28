<template>
<div>
    <div>
        <h3 class="font-bold text-center mb-3">Closed Tickets</h3>
    </div>
    <table class="table-auto mx-auto px-4 w-full text-center">
        <thead class="bg-black text-white">
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Subject</th>
            <th class="border px-4 py-2">Ticket Owner</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Assigned To</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-gray-400">
        <tr v-for="ticket in closedTickets">
            <td class="border px-4 py-2">{{ticket.id}}</td>
            <td class="border px-4 py-2">{{ticket.subject}}</td>
            <td class="border px-4 py-2">{{ticket.user.name}}</td>
            <td class="border px-4 py-2">{{ticket.category.category}}</td>
            <td class="border px-4 py-2">{{ticket.engineer.users.name}}</td>
            <td class="border py-2 px-4 text-center">
                <a href="">
                    <span class="mdi mdi-lock-open mdi-18px px-3"></span>
                </a>
                <a href="">
                    <span class="mdi mdi-eye mdi-18px px-3"></span>
                </a>
                <a href="">
                    <span class="mdi mdi-delete-empty mdi-18px px-3"></span>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "closedTickets",
        data(){
          return{
              closedTickets:[]
          }
        },
        created() {
            this.getClosedTickets()
        },
        methods:{
            getClosedTickets(){
                axios.get('/api/alltickets/closed')
                .then(r=>{
                    this.closedTickets =r.data
                })
            }
        }
    }
</script>

<style scoped>

</style>
