<template>
    <div>
        <div>
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-description">
                    </label>
                    <textarea v-model="comment" class="resize-y appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-description"
                              name="comment"/>
                </div>
            </div>
            <button @click="sendComment(comments)"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Send
            </button>
        </div>
    </div>
</template>
<script>
    export default {
        name: "comments",
        props:{
          comments:Object
        },
        data(){
            return{
                comment:''
            }
        },
        methods: {
            sendComment(info) {
                    this.$store.dispatch('tickets/addComment', {
                        comment: this.comment,
                        tickets_id: info.id,
                        users_id: info.user
                    })
                return this.$store.state.tickets.singleTicket
            }
        }
    }
</script>

<style scoped>

</style>
