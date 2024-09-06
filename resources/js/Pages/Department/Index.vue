<script setup>
import Header from "@/Components/Header.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import DepartmentOverview from "@/Components/DepartmentOverview.vue";
import EmployeeOverview from "@/Components/EmployeeOverview.vue";

const props = defineProps({
   departments: {
       type: Object,
       required: true
   }
});

console.log(props.departments)

</script>

<template>
    <Header heading="Departments" subheading="All Departments"/>
    <section class="flex-1">
        <DivFlexCol class="grid grid-cols-2 gap-5 p-5 w-full h-full rounded-lg border border-gray/20">
            <DepartmentOverview v-for="department in departments" members-count="20" :department="department.name">
                <EmployeeOverview v-for="employee in department.employees" position="unknown" :full-name="employee.firstName + ' ' + employee.lastName"/>
            </DepartmentOverview>
        </DivFlexCol>

    </section>
</template>

