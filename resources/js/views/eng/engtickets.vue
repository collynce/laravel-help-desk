<template>
    <div>
        {{tickets}}
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "engtickets",
        data(){
            return{
                tickets:[]
            }
        },
        created() {
            this.getEngTickets()
        },
        methods:{
            getEngTickets(){
                axios.get('/engineers').then(r=>{
                    this.tickets= r.data
                })
            }
        }
    }
</script>

<style scoped>

</style>
