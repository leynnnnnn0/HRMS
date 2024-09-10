<script setup>
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
import {Link, router, usePage} from "@inertiajs/vue3";
import {Notivue, push} from 'notivue'
import Button from "@/Components/Button.vue";
import {ref, watch} from "vue";
import {Head} from "@inertiajs/vue3";
import {throttle} from "lodash";
import {useEmployeeAction} from "@/Composables/useEmployeeAction.js";
import {useNotification} from "@/Composables/useNotification.js";

const { destroyEmployeeData } = useEmployeeAction();
const { pushConfirmation } = useNotification();

defineProps({
    employees: {
        type: Object,
        required: true
    }
})

let search = ref(usePage().props.filters.search);

watch(search, throttle(function(value){
    router.get(route('employees.index'), {search: value}, {
        preserveState: true,
        replace: true
    });
}, 500));

</script>

<template>
    <Head title="HRMS - Employee"/>
        <Notivue v-slot="item" class="z-50">
            <div v-if="item.props.delete" class="bg-white flex flex-col h-auto rounded-lg w-80 shadow-2xl p-4 z-50 gap-2">
                <strong>{{ item.message }}</strong>
                <div class="flex justify-end gap-2">
                    <Button @click="item.clear" class="bg-black/50 border border-gray-500 text-sm">Cancel</Button>
                    <Button @click="destroyEmployeeData(item.props.id, item, route('employees.destroy', item.props.id))" class="text-sm bg-red-500">Confirm</Button>
                </div>
            </div>
        </Notivue>

        <Header heading="Employees" subheading="All Employees"/>
        <section class="flex-1">
            <DivFlexCol class="p-5 w-full h-full rounded-lg border border-gray/20 space-y-5">
                <DivFlexCenter class="justify-between">
                <!-- Search Bar-->
                    <input v-model="search" type="text" placeholder="Search..." class="w-96 rounded-lg border-gray-200">
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
                        <TD>{{ employee.department }}</TD>
                        <TD>{{ employee.position }}</TD>
                        <TD>Team {{ employee.team }}</TD>
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
<!--    Paginate-->
    <div class="flex items-center justify-end gap-2">
        <Component v-for="(link) in employees.links"
                   :is="link.url ? 'Link' : 'span'"
                   :href="link.url"
                   v-html="link.label"
                   class="px-3 py-1 border border-gray-200 text-primary-font font-bold rounded-lg"
                   :class="{'bg-primary text-white' : link.active, 'hover:bg-primary/50 transition-colors transition-duration duration-300' : link.url}"
                   />
    </div>
</template>
