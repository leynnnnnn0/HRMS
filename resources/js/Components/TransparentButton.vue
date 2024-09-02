<script setup>
defineProps({
   icon: {
       type: String,
       required: true
   }
});
</script>
<template>
    <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-transparent border border-gray/20 font-light text-sm">
        <img class="size-4" :src="icon" alt="icon">
        <slot></slot>
    </button>
</template>
