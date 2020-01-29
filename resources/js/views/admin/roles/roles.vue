<template>
    <div>
        <ul class="flex mx-auto">
            <li class="mr-3" v-for="tab in tabs">
                <a  @click="[$refs.modal.show(), changeComponent(tab.component)]" class="inline-block border rounded py-1 px-3 bg-blue-500 text-white" href="#">
                    {{tab.name}}
                </a>
            </li>
        </ul>
        <t-modal
            wrapper-class="bg-gray-100 border-red-400 rounded shadow-xl flex flex-col"
            overlay-class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-gray-900 opacity-75"
            body-class="text-xl flex flex-col items-center justify-center p-6 flex-grow"
            footerClass="bg-teal-400 p-3 flex justify-between"
            class="mt-16 mx-auto"
            show
            ref="modal"
        >
            <keep-alive>
                <component :is="currentComponent" />
            </keep-alive>
            <template v-slot:footer>
                <t-button @click="$refs.modal.hide()" variant="danger">
                    Close
                </t-button>
            </template>
        </t-modal>

    </div>
</template>
<script>
    import createRoles from "./createRoles";
    import createPermissions from "../permissions/createPermissions";
    export default {
        name: "roles",
        components: {
            createRoles,
            createPermissions
        },
        data() {
            return {
                currentComponent:'',
                tabs:[
                    {
                        name:'Add Role',
                        component:'createRoles'
                    },
                    {
                        name:'Add Permission',
                        component:'createPermissions'
                    }
                ]
            }
        },
        methods: {
            changeComponent(name){
                this.currentComponent=name;
            }
        }
    }
</script>

<style scoped>

</style>
