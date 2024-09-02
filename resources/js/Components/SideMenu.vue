<script setup>
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import mainLogo from "@/Images/mainLogo.svg"
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import dashboard from "@/Images/Icons/dashboard.svg";
import SidebarLink from "@/Components/SidebarLink.vue";
import allEmployees from "@/Images/Icons/allEmployees.svg";
import activeAllEmployees from "@/Images/Icons/activeAllEmployees.svg";
import activeDashboard from "@/Images/Icons/activeDashboard.svg";
import {usePage} from "@inertiajs/vue3";

const isActive = (route) => {
    return route === usePage().url;
}

</script>

<template>
    <div class="w-64 bg-gray/5 rounded-lg p-5 space-y-8">
        <DivFlexCenter class="gap-2">
            <img :src="mainLogo" alt="logo">
            <h1 class="font-semibold text-primary-font text-2xl uppercase">hrms</h1>
        </DivFlexCenter>
        <DivFlexCol>
            <SidebarLink :active="isActive('/dashboard')"
                         :icon="dashboard"
                         :activeIcon="activeDashboard"
                         route="">Dashboard</SidebarLink>
            <SidebarLink :active="isActive('/all-employees')"
                         :icon="allEmployees"
                         :activeIcon="activeAllEmployees"
                         route="">All Employees</SidebarLink>
        </DivFlexCol>
    </div>
</template>
