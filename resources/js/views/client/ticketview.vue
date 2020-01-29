<template>
    <div class="container py-10 mx-auto">
        <table class="text-left w-full">
            <thead class="bg-black flex text-white w-full text-center">
            <tr class="flex w-full">
                <th class=" p-4 w-1/4">#</th>
                <th class=" p-4 w-1/4">Subject</th>
                <th class=" p-4 w-1/4">Status</th>
                <th class=" p-4 w-1/4">Category</th>
                <th class="p-4 w-1/4">Assigned To</th>
                <th class=" p-4 w-1/4">Created On</th>
                <th class=" p-4 w-1/4">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-gray-400 flex flex-col text-center items-center justify-between w-full" v-if="details.length === 0">
            <tr>
                No Data Available
            </tr>
            </tbody>
            <tbody v-else class="bg-gray-400 flex flex-col text-center items-center justify-between overflow-y-scroll w-full"
                   style="height: 50vh;">
            <tr class="flex w-full" v-for="data in details">
                <td class="border p-4 w-1/4">{{data.id}}</td>
                <td class="border p-4 w-1/4">{{data.subject}}</td>
                <td class="border p-4 w-1/4">{{data.status}}</td>
                <td class="border p-4 w-1/4">{{data.category.category}}</td>
                <td class="border p-4 w-1/4">{{data.engineer.users.name}}</td>
                <td class="border p-4 w-1/4">{{data.created_at}}</td>
                <td class="border p-4 w-1/4 text-center">
                    <router-link :to="`/details/` + data.id">
                        <span class="mdi mdi-eye mdi-30px text-teal-500 mr-6"></span>
                    </router-link>
                    <!--                    <a class="bg-yellow-700 hover:bg-teal-300 text-white font-bold py-2 px-4 rounded-full"-->
                    <!--                       href="">Edit</a>-->
                        <span class="mdi mdi-delete mdi-30px text-red-500 mr-6" @click="deleteTicket(data.id)"/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ticketview",
        components: {},
        created() {
            this.getTicketDetails()
        },
        computed: {
            details() {
                return this.$store.getters['tickets/getTickets']
            }
        },
        methods: {
            getTicketDetails() {
                this.$store.dispatch('tickets/getAllTickets')
            },
            deleteTicket(id){
                this.$store.dispatch('tickets/deleteTicket', id)
            }
        }

    }
</script>

<style scoped>

</style>
