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
import ProfessionalInformation from "@/Pages/Employee/Partials/ProfessionalInformation.vue";
import {ref} from "vue";
import PersonalInformation from "@/Pages/Employee/Partials/PersonalInformation.vue";
import AccountAccess from "@/Pages/Employee/Partials/AccountAccess.vue";
import ButtonLink from "@/Components/ButtonLink.vue";
import {useEmployeeForm} from "@/Composables/useEmployeeForm.js";
import {router, useRemember} from "@inertiajs/vue3";

const { personalInformationFormData, professionalInformationFormData, accountAccessFormData } = useEmployeeForm();
const stepCount = ref(1);
const formErrors = useRemember({});
const isActive = (display) => {
    return stepCount.value === display;
}
const next = () => {
    if(stepCount.value === 1)
        validateInputs('/api/personal-information/store', personalInformationFormData, formErrors);
    if(stepCount.value === 2)
        validateInputs('/api/professional-information/store', professionalInformationFormData, formErrors);
    if(stepCount.value === 3)
        validateInputs('/api/account-access/store', accountAccessFormData, formErrors);
}

const validateInputs = (url, data, errorsForm) => {
    axios.post(url, data.value)
        .then(response => {
            if(response.data.success){
                stepCount.value = stepCount.value + 1
                errorsForm.value = {};
            }
        })
        .catch(err => {
            if(err.response.data.errors){
                errorsForm.value = err.response.data.errors
            }
        });
}
const createEmployee = () => {
    const data =  {
        ...personalInformationFormData.value,
        ...professionalInformationFormData.value,
        ...accountAccessFormData.value
    }
    router.post(route('employees.store'), data,{
        onSuccess: page => console.log(page),
        onError: errors => console.log(errors)
    })
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
                <PersonalInformation :formData="personalInformationFormData" :formErrors="formErrors" v-if="stepCount === 1"/>
                <ProfessionalInformation :formData="professionalInformationFormData" :formErrors="formErrors" v-if="stepCount === 2"/>
                <AccountAccess :formData="accountAccessFormData" :formErrors="formErrors" v-if="stepCount === 3"/>
                <div class="flex h-full justify-end items-center gap-2 col-span-2">
                    <ButtonLink :href="route('employees.index')">Cancel</ButtonLink>
                    <Button v-if="stepCount < 4" @click="next">Next</Button>
                    <Button v-if="stepCount === 4" @click="createEmployee">Add</Button>
                </div>
            </DivFlexCol>
        </section>
    </MainLayout>
</template>
