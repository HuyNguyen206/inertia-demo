<template>
    <Head title="Create User"></Head>
    <div class="mt-4">
        <form @submit.prevent="submit">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input v-model="form.name" type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John" required>
                    <div class="text-red-500 mt-2" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div>
                    <label for="last_name"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input v-model="form.email" type="text" id="last_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Doe" required disabled>
                    <div class="text-red-500 mt-2" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
            </div>
            <div class="mb-6">
                <label for="password"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" v-model="form.password" id="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="•••••••••" >
                <div class="text-red-500 mt-2" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                    password</label>
                <input type="password" v-model="form.password_confirmation" id="confirm_password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="•••••••••" >
                <div class="text-red-500 mt-2" v-if="form.errors.password_confirmation">
                    {{ form.errors.password_confirmation }}
                </div>
            </div>
            <Button :processing="form.processing">Update</Button>
        </form>

    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import Button from "@/Pages/Shared/Button.vue";

let props = defineProps({
    editUser: Object
})

let form = useForm({
    name: props.editUser.name,
    email: props.editUser.email,
    password: '',
    password_confirmation: ''
})

let submit = () => {
    form.put(route('users.update', props.editUser.id))
}
</script>

<script>
</script>

<style scoped>

</style>
