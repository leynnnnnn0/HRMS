<script setup>

import Header from "@/Components/Header.vue";
import plusCircle from "@/Images/Icons/plusCircle.svg";
import filter from "@/Images/Icons/filter.svg";
import profile from "@/Images/Profile/Profile.png";
import view from "@/Images/Icons/view.svg";
import trash from "@/Images/Icons/trash.svg";
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";
import TransparentButton from "@/Components/TransparentButton.vue";
import TH from "@/Components/Table/TH.vue";
import TD from "@/Components/Table/TD.vue";
import Span from "@/Components/Text/Span.vue";
import {Link} from "@inertiajs/vue3";
import IconButton from "@/Components/IconButton.vue";

const props = defineProps({
   data: {
       type: Object,
       require: true
   }
});

console.log(props.data);
</script>

<template>
    <Header heading="Design Department" subheading="All Employees"/>
    <section class="flex-1">
        <DivFlexCol class="p-5 w-full h-full rounded-lg border border-gray/20 space-y-5">
            <DivFlexCenter class="justify-between">
                <!-- Search Bar-->
                <input type="text" placeholder="Search..." class="w-96 rounded-lg border-gray-200">
                <DivFlexCenter class="gap-5">
                    <PrimaryButtonLink :href="route('employees.create')" :icon="plusCircle">
                        Add New Employee
                    </PrimaryButtonLink>
                    <TransparentButton :icon="filter">
                        Filter
                    </TransparentButton>
                </DivFlexCenter>
            </DivFlexCenter>
            <!--            Table-->
            <table class="divide-y w-full">
                <thead>
                <tr>
                    <TH>Employee</TH>
                    <TH>Department</TH>
                    <TH>Position</TH>
                    <TH>Team</TH>
                    <TH>Actions</TH>
                </tr>
                </thead>
                <tbody class="divide-y">
                <template v-for="detail in data">
                    <tr v-for="data in detail.employment_details">
                        <TD>
                            <DivFlexCenter class="gap-3">
                                <img class="size-10 rounded-full" :src="profile" alt="profile">
                                <DivFlexCol>
                                    {{ data.employee.firstName + ' ' + data.employee.lastName }}
                                    <Span>
                                        ID: {{ data.employee.id }}
                                    </Span>
                                </DivFlexCol>
                            </DivFlexCenter>
                        </TD>
                        <TD>{{ detail.name }}</TD>
                        <TD>{{ data.position.name }}</TD>
                        <TD>{{ data.team.name }}</TD>
                        <TD>
                            <DivFlexCenter class="gap-2 w-fit">
                                <Link :href="route('employees.show', data.employee.id)">
                                    <IconButton class="bg-transparent" :icon="view"/>
                                </Link>
                                <IconButton class="bg-transparent" :icon="trash"/>
                            </DivFlexCenter>
                        </TD>
                    </tr>
                </template>
                </tbody>
            </table>

        </DivFlexCol>
    </section>
</template>

