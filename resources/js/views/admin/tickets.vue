<template>
    <div>
        <div class="container">
            <form class="form">
                <input placeholder="Category" type="text" v-model="form.category">
            </form>
            <button @click="post" class="btn btn-lg btn-primary">ADD</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "tickets",
        data() {
            return {
                form: {}
            }
        },
        computed: {},
        methods: {
            post() {
                this.$store.dispatch('category/addTicketCategory', this.form)
                    .then(res => console.log(res))
                    .catch(error => console.log(error))
            }
        }
    }
</script>

<style scoped>

</style>
