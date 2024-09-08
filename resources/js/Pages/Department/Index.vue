<script setup>
import Header from "@/Components/Header.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import DepartmentOverview from "@/Components/DepartmentOverview.vue";
import EmployeeOverview from "@/Components/EmployeeOverview.vue";
import {size} from "lodash";

const props = defineProps({
   departments: {
       type: Object,
       required: true
   }
});

</script>

<template>
    <Header heading="Departments" subheading="All Departments"/>
    <section class="flex-1">
        <DivFlexCol class="grid grid-cols-2 gap-5 p-5 w-full h-full rounded-lg border border-gray/20">
            <DepartmentOverview v-for="department in departments" :members-count="size(department.employee_details).toString()" :to="route('departments.show', department.id)" :department="department.name">
                <EmployeeOverview v-for="details in department.employee_details" position="unknown" :full-name="details.employee.firstName + ' ' + details.employee.lastName"/>
            </DepartmentOverview>
        </DivFlexCol>

    </section>
</template>

