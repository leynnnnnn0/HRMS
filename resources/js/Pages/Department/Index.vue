<script setup>
import Header from "@/Components/Header.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import DepartmentOverview from "@/Components/DepartmentOverview.vue";
import EmployeeOverview from "@/Components/EmployeeOverview.vue";
</script>

<template>
    <Header heading="Departments" subheading="All Departments"/>
    <section class="flex-1">
        <DivFlexCol class="grid grid-cols-2 gap-5 p-5 w-full h-full rounded-lg border border-gray/20">
            <DepartmentOverview members-count="20" department="Design Department">
                <EmployeeOverview position="Web Developer" full-name="John Doe"/>
                <EmployeeOverview position="Web Developer" full-name="John Doe"/>
                <EmployeeOverview position="Web Developer" full-name="John Doe"/>
                <EmployeeOverview position="Web Developer" full-name="John Doe"/>
                <EmployeeOverview position="Web Developer" full-name="John Doe"/>
            </DepartmentOverview>

        </DivFlexCol>
    </section>
</template>

