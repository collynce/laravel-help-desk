<template>
    <div class="container mx-auto">
        <roles/>
        <br>
        <t-modal
            body-class="text-xl flex flex-col items-center justify-center p-6 flex-grow"
            class="mt-16 mx-auto"
            footerClass="bg-teal-400 p-3 flex justify-between"
            overlay-class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-gray-900 opacity-75"
            ref="modal"
            show
            wrapper-class="bg-gray-100 border-red-400 rounded shadow-xl flex flex-col"
        >
            <keep-alive>
                <component :give-permissions="givePermissionss" @click.native="$refs.modal.show()" :is="currentComponent"/>
            </keep-alive>
            <template v-slot:footer>
                <t-button @click="$refs.modal.hide()" variant="danger">
                    Close
                </t-button>
            </template>
        </t-modal>
        <div class="flex w-full">
            <div class="flex-1 text-gray-700 text-center px-4 py-2 m-2">
                <h3 class="font-bold mb-5">Roles</h3>
                <t-table
                    :data="roles"
                    :headers="['Role', 'Permissions', 'Actions']"
                >
                    <template v-slot:row="props">
                        <tr :class="[props.trClass, props.rowIndex % 2 === 0 ? 'bg-gray-100' : '']">
                            <td :class="props.tdClass">
                                {{ props.row.roles }}
                            </td>
                            <td :class="props.tdClass">
                                <a v-if="props.row.permissions.length === 0">-</a>
                                <a v-else>
                                    <span v-for="p in props.row.permissions">
                                        {{p.permission}}{{','}}
                                    </span>
                                </a>
                            </td>
                            <td :class="props.tdClass">
                                <a @click="[$refs.modal.show(), emitMethod(1, props.row)]"
                                   class="text-blue-400 cursor-pointer hover:text-blue-600">Assign Permissions
                                </a>
                            </td>
                        </tr>
                    </template>
                </t-table>
            </div>
            <div class="flex-1 text-gray-700 text-center px-4 py-2 m-2">
                <h3 class="font-bold mb-5">Permissions</h3>
                <t-table
                    :data="permissions"
                    :headers="['Permission', 'Roles']"
                >
                    <template v-slot:row="props">
                        <tr :class="[props.trClass, props.rowIndex % 2 === 0 ? 'bg-gray-100' : '']">
                            <td :class="props.tdClass">
                                {{ props.row.permission }}
                            </td>
                            <td :class="props.tdClass">
                                <a v-if="props.row.roles.length ===0">-</a>
                                <span v-for="p in props.row.roles">
                                        {{p.roles}}{{','}}
                                    </span>
                            </td>
                        </tr>
                    </template>
                </t-table>
            </div>
        </div>
        <br>
        <div class="flex w-full">
            <div class="flex-1 text-gray-700 text-center px-4 py-2 m-2">
                <h3 class="font-bold mb-5">Users and Roles</h3>
                <user-roles/>
            </div>
        </div>
    </div>
</template>
<script>
    import roles from "./roles/roles";
    import assignPermission from "./permissions/assignPermission";
    import assignRole from "./roles/assignRole";
    import userRoles from "./userRoles";

    export default {
        name: "rolesView",
        components: {
            roles,
            assignRole,
            userRoles,
            assignPermission
        },
        data() {
            return {
                currentComponent: '',
                givePermissionss: ''
            }
        },
        computed: {
            roles() {
                return this.$store.getters['roles/getRoles']
            },
            permissions() {
                return this.$store.getters['permissions/getPermission']
            }
        },
        created() {
            this.getRolesPermissions()
        },
        methods: {
            getRolesPermissions() {
                this.$store.dispatch('roles/getRoles')
                    .then(r => console.log(r))
                    .catch(error => console.log(error));
                this.$store.dispatch('permissions/getPermissions')
                    .then(r => console.log(r))
                    .catch(error => console.log(error))
            },
            emitMethod(a, data) {
                if (a === 1) {
                    this.currentComponent = 'assignPermission';
                    this.givePermissionss = data;
                } else {
                    this.currentComponent = 'assignRole';
                    this.givePermissionss = data;
                }
            },

        }
    }
</script>

<style scoped>

</style>
