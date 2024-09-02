<script setup>

import SideMenu from "@/Components/SideMenu.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Header from "@/Components/Header.vue";
</script>

<template>
    <div class="flex min-h-screen p-4 text-primary-font">
        <SideMenu/>
        <DivFlexCol class="p-5 w-full">
            <Header/>
        </DivFlexCol>
    </div>
</template>
