<template>
    <div>
        <div :key="item.id" class="container px-4" v-for="item in items">
            <div
                class="border border-gray-400 rounded lg:border-gray-400 bg-white p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
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
                            </div>
                        </div>
                    </div>
                    <div class="px-2">
                        <div class="flex -mx-2">
                            <div class="w-1/2 px-2">
                                <div class="bg-gray-400 p-5 mx-auto">
                                    <p>
                                        Owner: {{item.user.name}}
                                    </p>
                                    <p>
                                        Status: {{item.status}}
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
                                        Assigned To: {{item.engineer.users.name}}
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
                        <h3 class="text-gray-900 leading-none">Description</h3>
                        <p class="text-gray-600">{{item.description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div :key="item.id" class="rounded shadow-lg mx-auto pt-5 px-auto" v-for="item in items">
            <div class="px-2" v-for="comment in item.comments" :key="comment.id">
                <div class="flex -mx-2">
                    <div class="w-1/3 px-2 mt-5">
                        <t-card>
                            <p>From: {{commentUser.name}}</p>
                            <p>
                                {{comment.comment}}
                            </p>
                        </t-card>
                    </div>
                    {{getUserComment(comment.users_id)}}
                </div>
            </div>
            <div v-if="item.closed_at === null">
                <comments :comments="{id:item.id, user:item.users_id}"/>
            </div>
        </div>
    </div>
</template>

<script>
    import comments from '../client/comments';
    import axios from 'axios'

    export default {
        name: "details",
        data(){
            return{
                commentUser:[],
                engineers:[]
            }
        },
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
            getAllEngineers(){
                axios.get('/api/engineers/details')
                    .then((r)=>{
                        console.log(r);
                        this.engineers = r.data
                    })
            },
            deleteTicket(id) {
                axios.post('/api/tickets/delete/'+id).then((r)=>{
                    console.log(r)
                })
            },
            reopenTicket(id){
                axios.post('/api/tickets/open/' + id)
                    .then(r => console.log(r))
                    .catch(er => console.log(er))
            },
            getUserComment(id){
                axios.post('/api/comments/users/'+id)
                    .then(r=>{
                        this.commentUser=r.data;
                    }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>
