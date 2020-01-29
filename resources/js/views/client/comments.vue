<template>
    <div class="container">
        <div class="mx-auto">
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full px-3">
                    <form>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-description">
                        </label>
                        <textarea v-model="comment" required placeholder="Enter a message" class="resize-y appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-description"
                                  name="comment"/>
                    </form>
                </div>
                <button @click="sendComment(comments)"
                        class="mx-auto bg-blue-500  hover:bg-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Send
                </button>
            </div>
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
                    }).then(()=>{
                       return  this.$store.state.tickets.singleTicket
                    });
            }
        }
    }
</script>

<style scoped>

</style>
