<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Header from "@/Components/Header.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import plusCircle from "@/Images/Icons/plusCircle.svg";
import filter from "@/Images/Icons/filter.svg";
import TransparentButton from "@/Components/PrimaryTransparentButton.vue";
import TH from "@/Components/Table/TH.vue";
import TD from "@/Components/Table/TD.vue";
import profile from "@/Images/Profile/Profile.png";
import Span from "@/Components/Text/Span.vue";
import IconButton from "@/Components/IconButton.vue";
import view from "@/Images/Icons/view.svg";
import trash from "@/Images/Icons/trash.svg";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";
import {Link, router} from "@inertiajs/vue3";
import {toast} from "vue3-toastify";
import {Notivue, Notification, push} from 'notivue'
import Button from "@/Components/Button.vue";

defineProps({
    employees: {
        type: Object,
        required: true
    }
})
const destroyEmployeeData = (id, item) => {
    item.clear();
    router.delete(route('employees.destroy', id),{
        preserveScroll: true,
        onSuccess: () => push.success({
            message: 'Deleted Successfully',
            props: {
                confirmation: false
            }
        }),
        onError: () => toast.error('Something Went Wrong:(')
    })
}

const pushConfirmation = (id) => {
    push.info({
        message: "Are you sure you want to delete this employee?",
        props: {
            confirmation: true,
            id: id
        }
    })
}

</script>

<template>
    <MainLayout>
        <Notivue v-slot="item" class="z-50">
            <div v-if="item.props.confirmation" class="bg-white flex flex-col h-auto rounded-lg w-80 shadow-2xl p-4 z-50 gap-2">
                <strong>{{ item.message }}</strong>
                <div class="flex justify-end gap-2">
                    <Button @click="item.clear" class="bg-black/50 border border-gray-500 text-sm">Cancel</Button>
                    <Button @click="destroyEmployeeData(item.props.id, item)" class="text-sm bg-red-500">Confirm</Button>
                </div>
            </div>
            <Notification v-else :item="item"/>
        </Notivue>

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
                    <tr v-for="employee in employees.data">
                        <TD>
                            <DivFlexCenter class="gap-3">
                                <img class="size-10 rounded-full" :src="profile" alt="profile">
                                <DivFlexCol>
                                    {{ employee.fullName }}
                                    <Span>
                                        ID: {{ employee.id }}
                                    </Span>
                                </DivFlexCol>
                            </DivFlexCenter>
                        </TD>
                        <TD>{{ employee.employment.department }}</TD>
                        <TD>{{ employee.employment.position }}</TD>
                        <TD>Team {{ employee.employment.team }}</TD>
                        <TD>
                            <DivFlexCenter class="gap-2 w-fit">
                                <Link :href="route('employees.show', employee.id)">
                                    <IconButton class="bg-transparent" :icon="view"/>
                                </Link>
                                <IconButton @click="pushConfirmation(employee.id)" class="bg-transparent" :icon="trash"/>
                            </DivFlexCenter>
                        </TD>
                    </tr>
                    </tbody>
                </table>

            </DivFlexCol>
        </section>
    </MainLayout>
</template>
