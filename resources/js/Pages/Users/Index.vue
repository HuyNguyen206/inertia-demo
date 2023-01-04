<template>
    <Head title="User"></Head>
    <div class="bg-green-400 text-white mt-4">
        Hello {{ name }}
    </div>
    <input type="text" v-model="search" class="mt-2 border border-gray-400 px-4 py-2 rounded-xl">
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tbody>
            <tr v-for="user in users.data" :key="user.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ user.name }}
                </th>
                <td class="py-4 px-6">
                    <InertiaLink v-if="user.permissions.editUser" class="text-blue-600 hover:cursor-pointer" :href="route('users.edit', user.id)">Edit
                    </InertiaLink>
                </td>
            </tr>
            </tbody>
        </table>
        <PaginationLink :links="users.meta.links"/>
    </div>
</template>

<script setup>
import {InertiaLink} from "@inertiajs/inertia-vue3";
import PaginationLink from "@/Pages/Shared/PaginationLink.vue";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import debounce from 'lodash/debounce'
let props = defineProps({
    name: String,
    users: Object,
    search: String
})

let search = ref(props.search)
watch(search, debounce(function (value){
    Inertia.get(route('users.index'), {search: value}, {preserveState: true, replace: true})
}, 500))
</script>

<script>
</script>
<style scoped>

</style>
