<script setup>
import SideMenu from "@/Components/SideMenu.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";

</script>

<template>
    <div class="flex min-h-screen p-4 text-primary-font">
        <SideMenu/>
        <DivFlexCol class="p-5 w-full space-y-10">
            <slot></slot>
        </DivFlexCol>
    </div>
</template>
