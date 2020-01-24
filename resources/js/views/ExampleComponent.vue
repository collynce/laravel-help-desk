<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data(){
            return{
                tickets:[]
            }
        },
        created() {
            console.log('Component mounted.');
            this.get()
        },
        methods: {
            get() {
                axios.get('api/tickets').then(res => this.tickets.push(res.data))
            }
        }
    }
</script>
