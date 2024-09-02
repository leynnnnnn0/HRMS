<script setup>
defineProps({
    icon: {
        type: String,
        required: true
    }
})
</script>

<template>
    <button class="flex items-center justify-center bg-gray-200 size-8 rounded-lg bg-gray/10">
        <img :src="icon" alt="icon">
    </button>
</template>
