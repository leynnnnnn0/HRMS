<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Header from "@/Components/Header.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import plusCircle from "@/Images/Icons/plusCircle.svg";
import filter from "@/Images/Icons/filter.svg";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TransparentButton from "@/Components/PrimaryTransparentButton.vue";
import TH from "@/Components/Table/TH.vue";
import TD from "@/Components/Table/TD.vue";
import profile from "@/Images/Profile/Profile.png";
import Span from "@/Components/Text/Span.vue";
import IconButton from "@/Components/IconButton.vue";
import view from "@/Images/Icons/view.svg";
import trash from "@/Images/Icons/trash.svg";
import edit from "@/Images/Icons/edit.svg";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";

</script>

<template>
    <MainLayout>
        <Header heading="Employees" subheading="All Employees"/>
        <section class="flex-1">
            <DivFlexCol class="p-5 w-full h-full rounded-lg border border-gray/20 space-y-5">
                <DivFlexCenter class="justify-between">
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
                    <tr>
                        <TD>
                            <DivFlexCenter class="gap-3">
                                <img class="size-10 rounded-full" :src="profile" alt="profile">
                                <DivFlexCol>
                                    Darlene Robertson
                                    <Span>
                                        ID: 134354
                                    </Span>
                                </DivFlexCol>
                            </DivFlexCenter>
                        </TD>
                        <TD>Development</TD>
                        <TD>Web Developer</TD>
                        <TD>Team Allan</TD>
                        <TD>
                            <DivFlexCenter class="gap-2 w-fit">
                                <IconButton class="bg-transparent" :icon="view"/>
                                <IconButton class="bg-transparent" :icon="edit"/>
                                <IconButton class="bg-transparent" :icon="trash"/>
                            </DivFlexCenter>
                        </TD>
                    </tr>
                    <tr>
                        <TD>
                            <DivFlexCenter class="gap-3">
                                <img class="size-10 rounded-full" :src="profile" alt="profile">
                                <DivFlexCol>
                                    Darlene Robertson
                                    <Span>
                                        ID: 134354
                                    </Span>
                                </DivFlexCol>
                            </DivFlexCenter>
                        </TD>
                        <TD>Development</TD>
                        <TD>Web Developer</TD>
                        <TD>Team Allan</TD>
                        <TD>
                            <DivFlexCenter class="gap-2 w-fit">
                                <IconButton class="bg-transparent" :icon="view"/>
                                <IconButton class="bg-transparent" :icon="edit"/>
                                <IconButton class="bg-transparent" :icon="trash"/>
                            </DivFlexCenter>
                        </TD>
                    </tr>
                    </tbody>
                </table>

            </DivFlexCol>
        </section>
    </MainLayout>
</template>
