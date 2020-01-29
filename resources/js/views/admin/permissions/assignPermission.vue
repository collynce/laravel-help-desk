<template>
    <div>
        <div  :key="perm.id" class="block text-gray-500 font-bold" v-for="perm in permissions">
            <p>
                {{perm.permission}}
            </p>
            <button @click="assignPermission(perm.id, givePermissions.id)"
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                    type="button">
                Assign
            </button>
        </div>
        <div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "assignPermission",
        props: ['givePermissions'],
        data() {
            return {
                model: '',
                permissionModel: ''
            }
        },
        computed: {
            permissions() {
                return this.$store.getters['permissions/getPermission']
            }
        },
        created() {
            this.getPermissions()
        },
        methods: {
            getPermissions() {
                this.$store.dispatch('permissions/getPermissions')
                    .then(r => console.log(r))
                    .catch(error => console.log(error))
            },
            assignPermission(id, roles) {
                this.$store.dispatch('roles/assignPermission', {id, roles})
            }
        }
    }
</script>

<style scoped>

</style>
