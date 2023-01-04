<template>
    <HighLight :code="code">
    </HighLight>

    <pre><code>
        class User extends Authenticatable
        {

        }
    </code></pre>
</template>

<script setup>
import HighLight from "@/Pages/Shared/HighLight.vue";

let code = ` class User extends Authenticatable
        {

        }`.trim()
</script>

<style scoped>

</style>
