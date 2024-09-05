<script setup>
defineProps({
   icon: {
       type: String,
       required: true
   },
    addClass: {
       type: String,
        default: ""
    }
});
</script>
<template>
    <button @click="$emit('buttonClick')" class="hover:bg-opacity-75 transition-colors transition-duration duration-300 flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-light text-sm" :class="addClass">
        <img class="size-4" :src="icon" alt="icon">
        <slot></slot>
    </button>
</template>
