<template>
    <div v-show="links">
        <ul class="flex space-x-2">
            <li v-for="link in links">
                <InertiaLink :href="link.url" :class='[link.active ? "bg-blue-600 text-white font-semibold" : "", !link.url ? "opacity-30 hover:cursor-not-allowed" : ""]'
                             class="inline-block p-2 border border-gray-500 mt-2" v-html="link.label">

                </InertiaLink>
            </li>
        </ul>
    </div>
</template>

<script setup>
import {InertiaLink} from "@inertiajs/inertia-vue3";

defineProps({
    links: Array
})
</script>

<style scoped>

</style>
