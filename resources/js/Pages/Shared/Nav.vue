<template>
    <nav>
        <ul class="flex space-x-4">
            <div v-if="auth.user">
                <NavLink :href="route('users.index')"
                         :class="[$page.component === 'Users/Index' ? 'font-semibold text-underline' : '']">Index
                </NavLink>
                <NavLink :href="route('users.create')" v-if="auth.permissions.createUser"
                         :class="[$page.component === 'Users/Create' ? 'font-semibold text-underline': '']">Create
                </NavLink>
                <NavLink :href="route('logout')" method="post" as="button"><span
                    class="inline-block mr-2">{{ auth.user.email }}</span>Logout
                </NavLink>
            </div>
            <div v-if="!auth.user">
                <NavLink :href="route('login')" method="get">Login</NavLink>
                <NavLink :href="route('login')" method="get">Register</NavLink>
            </div>
            <!--            <li><InertiaLink class="bg-blue-500 text-white px-4 py-2 rounded-xl" :href="route('users.index')" :class="{'bg-purple-600': $page.component === 'Users/Index'}">Index</InertiaLink></li>-->
            <!--            <li><InertiaLink class="bg-blue-500 text-white px-4 py-2 rounded-xl" :href="route('users.create')" :class="{'bg-purple-600': $page.component === 'Users/Create'}">Create</InertiaLink></li>-->
            <!--            <li><InertiaLink class="bg-blue-500 text-white px-4 py-2 rounded-xl" :href="route('logout')" method="post" as="button" :data="{name: 'huy'}" >Logout</InertiaLink></li>-->
        </ul>
    </nav>
</template>

<script setup>
import NavLink from "../Users/NavLink.vue";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

let auth = computed(() => usePage().props.value.auth)
</script>

<style scoped>

</style>
