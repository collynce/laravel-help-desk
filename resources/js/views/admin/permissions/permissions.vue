<template>
    <div>
        <t-table
            :data="[
    {
      id: 1,
      name: 'Alfonso Bribiesca',
      email: 'alfonso@vexilo.com',
      is_approved: true,
    },
    {
      id: 2,
      name: 'Saida Redondo',
      email: 'saida@gmail.com',
      is_approved: false,
    },
  ]"
            :headers="['Name', 'E-mail', 'Status', '']"
            :responsive="true"
            :responsive-breakpoint="1024"
            :tbody-class="{ tbody: 'border-t lg:border-0', tr: 'border-0 lg:border-t', td: 'p-3' }"
        >
            <template v-slot:tbody="{ tbodyClass, trClass, tdClass, thClass, renderResponsive, data }">
                <template v-if="renderResponsive">
                    <tbody
                        :class="[tbodyClass, rowIndex % 2 === 0 ? 'bg-gray-100' : '']"
                        :key="rowIndex"
                        v-for="(row, rowIndex) in data">
                    <tr :class="trClass">
                        <th :class="thClass">Name</th>
                        <td :class="[tdClass, 'relative']">
                            <t-dropdown
                                :visible-arrow="false"
                                class="absolute right-0 top-0"
                                placement="left-start"
                                variant="tertiary"
                            >
                                <template v-slot:button-content>
                                    <svg class="fill-current text-gray-600 svg-icon svg-fill" heigth="20"
                                         style="width: 20px;" version="1.1"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M13 7a2 2 0 1 1 .001 3.999A2 2 0 0 1 13 7zM8 7a2 2 0 1 1 .001 3.999A2 2 0 0 1 8 7zM3 7a2 2 0 1 1 .001 3.999A2 2 0 0 1 3 7z"
                                            pid="0"/>
                                    </svg>
                                </template>
                                <button
                                    class="block hover:text-white text-gray-800 px-4 py-2 hover:bg-blue-500 w-full text-left"
                                >Edit
                                </button>
                                <button
                                    class="block hover:text-white text-gray-800 px-4 py-2 hover:bg-blue-500 w-full text-left"
                                >Delete
                                </button>
                            </t-dropdown>
                            {{ row.name }}
                        </td>
                    </tr>
                    <tr :class="trClass">
                        <th :class="thClass">Email</th>
                        <td :class="[tdClass, 'td-overflow']">
                            <a
                                :href="`mailto: ${row.email}`"
                                class="text-gray-600 hover:underline"
                            >{{ row.email }}</a>
                        </td>
                    </tr>
                    <tr :class="trClass">
                        <th :class="thClass">Status</th>
                        <td :class="[tdClass]">
            <span
                class="d-flex py-1 px-5 bg-green-200 text-green-900 text-sm rounded-full font-bold"
                v-if="row.is_approved"
            >
              Active
            </span>
                            <span
                                class="d-flex py-1 px-5 bg-gray-200 text-gray-900 text-sm rounded-full font-bold"
                                v-else
                            >
              Inactive
            </span>
                        </td>
                    </tr>
                    </tbody>
                </template>
            </template>
            <template v-slot:row="{ trClass, tdClass, rowIndex, row }">
                <tr :class="[trClass, rowIndex % 2 === 0 ? 'bg-gray-100' : '']">
                    <td :class="[tdClass, 'w-full']">
                        {{ row.name }}
                    </td>
                    <td :class="tdClass">
                        <a
                            :href="`mailto: ${row.email}`"
                            class="text-gray-600 hover:underline"
                        >{{ row.email }}</a>
                    </td>
                    <td :class="[tdClass, 'text-center']">
        <span
            class="d-flex py-2 px-5 bg-green-200 text-green-900 text-sm rounded-full font-bold"
            v-if="row.is_approved"
        >
          Active
        </span>
                        <span
                            class="d-flex py-2 px-5 bg-gray-200 text-gray-900 text-sm rounded-full font-bold"
                            v-else
                        >
          Inactive
        </span>
                    </td>
                    <td :class="[tdClass, 'text-right']">
                        <t-dropdown
                            :visible-arrow="false"
                            placement="bottom-end"
                            variant="tertiary"
                        >
                            <template v-slot:button-content>
                                <svg class="fill-current text-gray-600 svg-icon svg-fill" heigth="20"
                                     style="width: 20px;" version="1.1"
                                     viewBox="0 0 16 16">
                                    <path
                                        d="M13 7a2 2 0 1 1 .001 3.999A2 2 0 0 1 13 7zM8 7a2 2 0 1 1 .001 3.999A2 2 0 0 1 8 7zM3 7a2 2 0 1 1 .001 3.999A2 2 0 0 1 3 7z"
                                        pid="0"/>
                                </svg>
                            </template>
                            <button
                                class="block hover:text-white text-gray-800 px-4 py-2 hover:bg-blue-500 w-full text-left"
                            >Edit
                            </button>
                            <button
                                :to="{ name: 'settings.profile' }"
                                class="block hover:text-white text-gray-800 px-4 py-2 hover:bg-blue-500 w-full text-left"
                            >Delete
                            </button>
                        </t-dropdown>
                    </td>
                </tr>
            </template>
            <template v-slot:tfoot="{ tfootClass, trClass, tdClass, renderResponsive }">
                <tfoot :class="tfootClass">
                <tr :class="trClass">
                    <td
                        :class="tdClass"
                        :colspan="renderResponsive ? 2 : 4"
                    >
                        <t-pagination
                            :class="{'ml-auto': !renderResponsive, 'mx-auto': renderResponsive}"
                            :hide-prev-next-controls="renderResponsive"
                            :per-page="renderResponsive ? 3 : 5"
                            :total-items="100"
                        />
                    </td>
                </tr>
                </tfoot>
            </template>
        </t-table>
    </div>
</template>

<script>
    export default {
        name: "permissions"
    }
</script>

<style scoped>

</style>
