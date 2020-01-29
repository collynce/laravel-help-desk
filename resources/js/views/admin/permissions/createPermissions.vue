<template>
    <div>
        <form class="mx-auto">
            <t-input-group
                label="Permission Name"
            >
                <t-input
                    v-model="permission"
                    type="text"
                    placeholder="Enter a Permission"
                />
            </t-input-group>
        </form>
        <div>
            <button @click="addPermission" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                Add
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "createPermissions",
        data(){
            return{
                permission:''
            }
        },
        methods:{
            addPermission(){
                this.$store.dispatch('permissions/addPermission', {
                    permission:this.permission
                })
            }
        }
    }
</script>

<style scoped>

</style>
