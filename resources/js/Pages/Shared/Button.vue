<template>
    <button type="submit" :disabled="processing" :class="[processing ? 'bg-gray-700' : 'bg-blue-700 hover:bg-blue-800']" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <slot></slot>
    </button>
</template>

<script setup>
defineProps({
    processing: {
        type: Boolean,
        default: false
    }
})
</script>

<style scoped>

</style>
