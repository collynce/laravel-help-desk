<template>
    <div>
        <t-modal
            body-class="text-xl flex flex-col items-center justify-center p-6 flex-grow"
            class="mt-16 mx-auto"
            footerClass="bg-teal-400 p-3 flex justify-between"
            overlay-class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-gray-900 opacity-75"
            ref="modal"
            show
            wrapper-class="bg-gray-100 border-red-400 rounded shadow-xl flex flex-col"
        >
            <div>
                <table class="table-auto">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr :key="role.id" v-for="role in roles">
                        <td class="border px-4 py-2">{{role.id}}</td>
                        <td class="border px-4 py-2">{{role.roles}}</td>
                        <td class="border px-4 py-2">
                           <span @click="assignRole(role.id)" class="text-teal-300 cursor-pointer">
                               Assign
                           </span>
                            <span class="mdi mdi-delete mdi-24px text-red-500"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <template v-slot:footer>
                <t-button @click="$refs.modal.hide()" variant="danger">
                    Close
                </t-button>
            </template>
        </t-modal>
        <table class="text-left w-full">
            <thead class="bg-black flex text-white w-full text-center">
            <tr class="flex w-full">
                <th class=" p-4 w-1/3">Name</th>
                <th class=" p-4 w-1/3">Roles</th>
                <th class=" p-4 w-1/3">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-gray-400 flex flex-col text-center items-center justify-between overflow-y-scroll w-full">
            <tr class="flex w-full" v-for="data in users">
                <td class="border p-4 w-1/3">{{data.name}}</td>
                <td class="border p-4 w-1/3">
                    <span v-if="data.roles.length === 0">
                        -
                    </span>
                    <span v-else v-for="role in data.roles">
                        {{role.roles}}
                    </span>
                </td>
<!--                <td class="border p-4 w-1/4">-->
<!--                    <span v-if="data.permissions.length === 0">-->
<!--                        - -->
<!--                    </span>-->
<!--                    <span v-else v-for="perm in data.permissions">-->
<!--                        {{perm.permission}}-->
<!--                    </span>-->
<!--                </td>-->
                <td class="border p-4 w-1/3 text-center">
                        <span @click="[$refs.modal.show(), passRoleId(data.id)]"
                              class="cursor-pointer text-teal-500 hover:bg-blue-300 mr-6">
                            Assign Role
                        </span>
                    <a href="">
                        <span class="mdi mdi-delete mdi-30px hover:bg-teal-300 text-red-500 mr-6">

                        </span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "userRoles",
        data() {
            return {
                userId: ''
            }
        },
        computed: {
            users() {
                return this.$store.getters['users/getUsers']
            },
            roles() {
                return this.$store.getters['roles/getRoles']

            }
        },
        created() {
            this.$store.dispatch('users/getAllUsers');
            this.$store.dispatch('roles/getRoles')
        },
        methods: {
            passRoleId(id) {
                this.userId = id;
            },
            assignRole(id) {
                this.$store.dispatch('users/assignRole', {
                    users_id:this.userId,
                    roles_id:id
                });

            }
        }
    }
</script>

<style scoped>

</style>
