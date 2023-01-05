<template>
    <Head title="My app"></Head>
    <header class="flex justify-between items-center mb-2 p-3 bg-gray-200">
        <div class="flex space-x-2">
            <h1>My App</h1>
        </div>
        <Nav class="mb-4"/>
    </header>
    <div class="container w-4/5 max-w-6xl mx-auto">
        <slot/>
    </div>
</template>

<script setup>
import Nav from "../Shared/Nav.vue";
</script>

<style scoped>

</style>
