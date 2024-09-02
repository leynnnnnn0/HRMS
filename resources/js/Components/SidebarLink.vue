<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
   icon: {
       type: String,
       required: true
   },
    activeIcon: {
       type: String,
        required: true
    },
    route: {
       type: String,
        required: true,
    },
    alt: {
       type: String,
        default: "icon"
    },
    active: {
       type: Boolean,
        default: false
    }
});

</script>

<template>
    <Link :href="route"
          :class="{ 'border-l-2 border-primary bg-gray/10 text-primary font-bold' : active }"
          class="flex items-center h-12 rounded-r-lg p-5 gap-3 text-primary-font">
        <img :src="active ? activeIcon : icon"
             :alt="alt">
        <span>
            <slot></slot>
        </span>
    </Link>
</template>
