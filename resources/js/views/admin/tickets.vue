<template>
    <div class="container ">
        <div class="bg-white">
            <nav class="flex mx-auto w-full flex-col lg:flex-row">
                <ul class="flex border-b">
                    <li class="-mb-px mr-1" v-for="t in tabs">
                        <a
                            :activeClass="activeClass"
                            @click="currentComponent(t.component)"
                            class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#">
                            {{t.name}}
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="w-full mx-auto">
            <keep-alive>
                <component :is="currentTabComponent"/>
            </keep-alive>
        </div>
        {{$route.params.id}}
    </div>
</template>
<script>
    import alltickets from "../tickets/alltickets";
    import open from "../tickets/open";
    import closedTickets from '../tickets/closed';
    import unassigned from '../tickets/unassigned';

    export default {
        name: "tickets",
        components: {
            alltickets,
            open,
            closedTickets,
            unassigned
        },
        data() {
            return {
                form: {},
                ticket: {},
                category: '',
                data:{
                    active:'bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold',
                    notActive:'bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold',
                },
                borderColor: 'border-blue-500',
                isActive:false,
                currentTabComponent: 'alltickets',
                tabs: [
                    {
                        name: 'All Tickets',
                        border:this.borderColor,
                        component: 'alltickets'
                    },
                    {
                        name: 'Open Tickets',
                        border:this.borderColor,
                        component: 'open'
                    },
                    {
                        name: 'Closed Tickets',
                        border:this.borderColor,
                        component: 'closedTickets'
                    },
                    {
                        name: 'Unassigned Tickets',
                        border:this.borderColor,
                        component: 'unassigned'
                    }
                ]
            }
        },
        created() {
            this.getCategories()
        },
        computed:{
            activeClass(){
                if (this.isActive === true){
                    return this.data.active
                }else{
                    return this.data.notActive
                }
            }
        },
        methods: {
            currentComponent(name) {
                this.isActive=true;
                this.currentTabComponent = name;
            },
            addTicketCategory() {
                // this.$store.dispatch('category/addTicketCategory', this.form)
                //     .then(res =>{
                //         console.log(res)
                //         this.getCategories();
                //     })
                //     .catch(error => console.log(error))
            },
            addTicket() {
                // this.$store.dispatch('tickets/createTicket', this.ticket)
                //     .then((res) => console.log(res))
                //     .catch((error) => console.log(error))
            },
            getCategories() {
                // axios.get('/api/tickets/category')
                //     .then((res)=>{
                //         this.category = res.data;
                //     })
                //     .catch((error)=>console.log(error));
            }

        }
    }
</script>

<style scoped>

</style>
