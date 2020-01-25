<template>
    <div>
        <div class="container">
            <form class="form">
                <input placeholder="Category" type="text" name="category" v-model="form.category">
            </form>
            <button @click="addTicketCategory" class="btn btn-lg btn-primary">ADD</button>
        </div>
        <br>
        <div class="container">
            <form action="">
                <input type="text" v-model="ticket.subject" name="subject">
                <br>
                <select name="category" v-model="ticket.category">
                    <option value="" :value="cat.id"  v-for="cat in category">{{cat.category}}</option>
                </select>
            </form>
            <button @click="addTicket" class="btn btn-lg btn-primary">ADD</button>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    export default {
        name: "tickets",
        data() {
            return {
                form: {},
                ticket:{},
                category: ''
            }
        },
        created() {
            this.getCategories()
        },
        computed: {

        },
        methods: {
            addTicketCategory() {
                this.$store.dispatch('category/addTicketCategory', this.form)
                    .then(res =>{
                        console.log(res)
                        this.getCategories();
                    })
                    .catch(error => console.log(error))
            },
            addTicket() {
                this.$store.dispatch('tickets/createTicket', this.ticket)
                    .then((res) => console.log(res))
                    .catch((error) => console.log(error))
            },
            getCategories(){
                axios.get('/api/tickets/category')
                    .then((res)=>{
                        this.category = res.data;
                    })
                    .catch((error)=>console.log(error));
            }

        }
    }
</script>

<style scoped>

</style>
