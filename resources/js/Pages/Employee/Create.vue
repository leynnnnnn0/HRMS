<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Header from "@/Components/Header.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import user from "@/Images/Icons/user.svg";
import briefcase from "@/Images/Icons/briefcase.svg";
import lock from "@/Images/Icons/lock.svg";
import Button from "@/Components/Button.vue";
import TransparentButton from "@/Components/TransparentButton.vue";
import ProfessionalInformation from "@/Pages/Employee/Partials/ProfessionalInformation.vue";
import {ref} from "vue";
import PersonalInformation from "@/Pages/Employee/Partials/PersonalInformation.vue";
import AccountAccess from "@/Pages/Employee/Partials/AccountAccess.vue";
import ButtonLink from "@/Components/ButtonLink.vue";

const stepCount = ref(1);
const isActive = (display) => {
    return stepCount.value === display;
}

const next = () => {
    if(stepCount.value < 3) stepCount.value = stepCount.value + 1;
    console.log(stepCount.value)
}


</script>

<template>
    <MainLayout>
        <Header heading="Add New Employee" subheading="All Employee > Add New Employee"/>
        <section class="flex-1">
            <DivFlexCol class="p-5 w-full h-auto rounded-lg border border-gray/20 space-y-5">
                  <DivFlexCenter class="gap-5">
                      <PrimaryButton @button-click="stepCount = 1" :icon="user" addClass="bg-transparent">
                          <span class="text-primary-font" :class="{'border-b-2 border-primary' : isActive(1)}">Personal Information</span>
                      </PrimaryButton>
                      <PrimaryButton @button-click="stepCount = 2" :icon="briefcase" addClass="bg-transparent">
                          <span class="text-primary-font" :class="{'border-b-2 border-primary' : isActive(2)}">Professional Information</span>
                      </PrimaryButton>
                      <PrimaryButton @button-click="stepCount = 3" :icon="lock" addClass="bg-transparent">
                          <span class="text-primary-font" :class="{'border-b-2 border-primary' : isActive(3)}">Account Access</span>
                      </PrimaryButton>
                </DivFlexCenter>
                <PersonalInformation v-if="stepCount === 1"/>
                <ProfessionalInformation v-if="stepCount === 2"/>
                <AccountAccess v-if="stepCount === 3"/>
                <div class="flex h-full justify-end items-center gap-2 col-span-2">
                    <ButtonLink :href="route('employees.index')">Cancel</ButtonLink>
                    <Button v-if="stepCount < 3" @click="next">Next</Button>
                    <Button v-if="stepCount === 3">Add</Button>
                </div>
            </DivFlexCol>
        </section>
    </MainLayout>
</template>
