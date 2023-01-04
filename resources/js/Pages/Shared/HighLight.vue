<template>
<!--    <div class="relative">-->
<!--        <button class="absolute top-0 right-0">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">-->
<!--                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />-->
<!--            </svg>-->
<!--        </button>-->
    <div class="relative">
        <div class="absolute flex justify-end items-center space-x-2 bg-gray-500 top-0 right-0 left-0 pr-2">
            <svg @click="copy" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" title="Copy" class="hover:opacity-80 p-2 hover:cursor-pointer w-10 h-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
            </svg>
            <span v-if="isCopied" class="text-white inline-block">Copied</span>
        </div>
         <pre>
        <code ref="block" class="h-full">
         {{code}}
        </code>
    </pre>
    </div>

<!--    </div>-->

</template>

<script setup>
import {highlightElement} from "@/HighlightService";
import {onMounted, ref} from "vue";
import {useClipboard} from "@/Composables/UseClipboard";

let props = defineProps({
    code: String
})
let {supported, copy, isCopied} = useClipboard(props.code)

const block = ref(null)

onMounted(() => {
    highlightElement(block.value)
})

</script>

<style scoped>

</style>
