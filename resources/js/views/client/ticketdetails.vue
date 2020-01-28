<template>
    <div>
        <div :key="item.id" class="container px-4" v-for="item in items">
            <div
                class="border border-gray-400 rounded lg:border-gray-400 bg-white p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/>
                        </svg>
                        Members only
                    </p>
                    <div class="flex -mx-2">
                        <div class="w-1/2 px-2">
                            <div class="text-gray-900 font-bold text-xl mb-2">{{item.subject}}</div>
                        </div>
                        <div class="w-1/2 px-2">
                            <div class="float-right mb-2">
                                <button v-if="item.closed_at === null && item.reopened_at === null" @click="makeCompleted(item.id)"
                                        class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border rounded">
                                    Close
                                </button>
                                <button v-else-if="item.closed_at !== null && item.reopened_at === null" @click="reopenTicket(item.id)"
                                        class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border rounded">
                                    Reopen
                                </button>
                                <button v-else @click="makeCompleted(item.id)"
                                        class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border rounded">
                                    Close
                                </button>
                                <button @click="deleteTicket(item.id)"
                                        class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border rounded">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--                    <p class="text-gray-700 text-base">{{item}}</p>-->

                    <div class="px-2">
                        <div class="flex -mx-2">
                            <div class="w-1/2 px-2">
                                <div class="bg-gray-400 p-5 mx-auto">
                                    <p>
                                        Owner: {{item.user.name}}
                                    </p>
                                    <p>
                                        Status: {{item.status.status}}
                                    </p
                                    >
                                    <p>
                                        Category: {{item.category.category}}
                                    </p>
                                </div>
                            </div>
                            <div class="w-1/2 px-2">
                                <div class="bg-gray-400 p-5 mx-auto">
                                    <p>
                                        Assigned To: {{item.engineer}}
                                    </p>
                                    <p>
                                        Created: {{item.created_at}}
                                    </p>
                                    <p>
                                        Updated: {{item.updated_at}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">Comments and Messages</p>
                        <p class="text-gray-600">Aug 18</p>
                    </div>
                </div>
            </div>
        </div>
        <div :key="item.id" class="rounded shadow-lg mx-auto pt-5 px-auto" v-for="item in items">
            <div class="px-2" v-for="comment in item.comments">
                <div class="flex -mx-2">
                    <div class="w-1/3 px-2 mt-5">
                        <div class="bg-gray-400">
                            <p>
                                {{comment.comment}}
                            </p>
                            <p class="text-gray-600">{{comment}}</p>
                        </div>
                    </div>
                    <div class="w-1/3 px-2">
                        <div class="bg-gray-400">

                        </div>
                    </div>
                </div>
            </div>
            <div v-if="item.closed_at === null">
                <comments :comments="{id:item.id, user:item.users_id}"/>
            </div>
        </div>
    </div>
</template>

<script>
    import comments from "./comments";
    import axios from 'axios'

    export default {
        name: "ticketdetails",
        components: {
            comments
        },
        computed: {
            items() {
                return this.$store.state.tickets.singleTicket
            }
        },
        created() {
            this.getDetails(this.$route.params.id)
        },
        methods: {
            getDetails(id) {
                this.$store.dispatch('tickets/showSingleTicketDetails', id);
            },
            makeCompleted(id) {
                axios.post('/api/tickets/close/' + id)
                    .then(r => console.log(r))
                    .catch(er => console.log(er))
            },
            deleteTicket(id) {
                console.log(id)
            },
            reopenTicket(id){
                axios.post('/api/tickets/open/' + id)
                    .then(r => console.log(r))
                    .catch(er => console.log(er))
            }
        }
    }
</script>

<style scoped>

</style>
