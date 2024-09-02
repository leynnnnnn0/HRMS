<script setup>
defineProps({
    type: {
        type: String,
        default: "text"
    },
});
</script>

<template>
    <input :type="type" class="border border-black/10 rounded-lg">
</template>
