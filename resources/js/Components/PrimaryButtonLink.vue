<script setup>
import { Link } from "@inertiajs/vue3";
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
    <Link class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-light text-sm" :class="addClass">
        <img class="size-4" :src="icon" alt="icon">
        <slot></slot>
    </Link>
</template>
