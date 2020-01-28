<template>
    <div class=" container py-10">

        <table class="table-auto">
            <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Subject</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Assigned To</th>
                <th class="px-4 py-2">Created On</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="data in details">
                <td class="border px-4 py-2">{{data.id}}</td>
                <td class="border px-4 py-2">{{data.subject}}</td>
                <td class="border px-4 py-2">{{data.status.status}}</td>
                <td class="border px-4 py-2">{{data.category.category}}</td>
                <td class="border px-4 py-2">{{data.engineer}}</td>
                <td class="border px-4 py-2">{{data.created_at}}</td>
                <td class="border px-4 py-2">
                    <router-link :to="`/details/` + data.id"
                       class="bg-blue-700 hover:bg-teal-300  text-white font-bold py-2 px-4 rounded-full">View</router-link>
<!--                    <a class="bg-yellow-700 hover:bg-teal-300 text-white font-bold py-2 px-4 rounded-full"-->
<!--                       href="">Edit</a>-->
                    <a class="bg-red-700 hover:bg-teal-300  text-white font-bold py-2 px-4 rounded-full"
                       href="">
                        Delete
                    </a>
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
            }
        }

    }
</script>

<style scoped>

</style>
