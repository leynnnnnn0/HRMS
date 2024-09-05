<script setup>
import Spinner from "@/Components/Spinner.vue";
defineProps({
    isLoading: {
        type: true,
        default: false
    }
})
</script>
<template>
    <button class="text-white bg-primary rounded-lg px-3 py-1 hover:bg-opacity-50 transition-colors transition-duration duration-300">
        <Spinner v-if="isLoading"/>
        <slot v-if="!isLoading"></slot>
    </button>
</template>

