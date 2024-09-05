<script setup>
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import mainLogo from "@/Images/mainLogo.svg"
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import dashboard from "@/Images/Icons/dashboard.svg";
import SidebarLink from "@/Components/SidebarLink.vue";
import allEmployees from "@/Images/Icons/allEmployees.svg";
import activeAllEmployees from "@/Images/Icons/activeAllEmployees.svg";
import activeDashboard from "@/Images/Icons/activeDashboard.svg";
import departments from "@/Images/Icons/community.svg";
import activeDepartments from "@/Images/Icons/connection.svg";
import {usePage} from "@inertiajs/vue3";

const isActive = (route) => {
    return usePage().url.includes(route);
}

</script>

<template>
    <div class="min-w-56 bg-gray/5 rounded-lg p-5 space-y-8">
        <DivFlexCenter class="gap-2">
            <img :src="mainLogo" alt="logo">
            <h1 class="font-semibold text-primary-font text-2xl uppercase">hrms</h1>
        </DivFlexCenter>
        <DivFlexCol>
            <SidebarLink :active="isActive('/dashboard')"
                         :icon="dashboard"
                         :activeIcon="activeDashboard"
                         :href="route('dashboard')">Dashboard</SidebarLink>
            <SidebarLink :active="isActive('/employees')"
                         :icon="allEmployees"
                         :activeIcon="activeAllEmployees"
                         :href="route('employees.index')">All Employees</SidebarLink>
            <SidebarLink :active="isActive('/departments')"
                         :icon="departments"
                         :activeIcon="activeDepartments"
                         :href="route('departments.index')">Departments</SidebarLink>
        </DivFlexCol>
    </div>
</template>
