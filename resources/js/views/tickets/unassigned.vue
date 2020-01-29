<template>
    <div>
        <div>
            <h3 class="font-bold text-center mb-3">Unassigned Tickets</h3>
        </div>
        <table class="table-auto mx-auto px-4 w-full">
            <thead class="bg-black text-white">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Category</th>
                <th class="border px-4 py-2">Subject</th>
                <th class="border px-4 py-2">Assigned To</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-gray-400 flex flex-col text-center items-center justify-between w-full" v-if="unassignedTickets.length === 0">
            <tr>
                No Data Available
            </tr>
            </tbody>
            <tbody v-else class="bg-gray-400">
            <tr v-for="ticket in unassignedTickets">
                <td class="border px-4 py-2">{{ticket.id}}</td>
                <td class="border px-4 py-2">{{ticket.category.category}}</td>
                <td class="border px-4 py-2">{{ticket.subject}}</td>
                <td class="border px-4 py-2">{{ticket.engineer}}</td>
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
        name: "unassigned",
        data() {
            return {
                unassignedTickets: []
            }
        },
        created() {
            this.getUnassignedTickets()
            {

            }
        },
        methods: {
            getUnassignedTickets() {
                axios.get('/api/alltickets/unassigned')
                    .then(r => {
                        this.unassignedTickets = r.data;
                    })
            }
        }

    }
</script>

<style scoped>

</style>
