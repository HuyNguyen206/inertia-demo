<template>
        <h2 class="text-xl font-semibold mb-2">Login</h2>
        <form @submit.prevent="submit">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                    <input v-model="form.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
                    <div class="text-red-500 mt-2" v-if="form.errors.email">{{form.errors.email}}</div>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input v-model="form.password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                    <div class="text-red-500 mt-2" v-if="form.errors.password">{{form.errors.name}}</div>
                </div>
                <div>
                    <Button :processing="form.processing">Login</Button>
                </div>
            </div>
        </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import Button from "../Shared/Button.vue";

let submit = () => {
    form.post(route('login'))
}
let form = useForm({
    email:'',
    password:''
})

</script>

<script>
export default {
    // layout: null,
}
</script>

<style scoped>

</style>
