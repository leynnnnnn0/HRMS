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
import {router, useForm, useRemember} from "@inertiajs/vue3";
import TransparentButton from "@/Components/TransparentButton.vue";
import {toast} from "vue3-toastify";
import { Notivue, Notification, push } from 'notivue'

const { personalInformationFormData, professionalInformationFormData, accountAccessFormData } = useEmployeeForm();
const stepCount = ref(1);
const formErrors = useRemember({});
const isActive = (display) => {
    return stepCount.value === display;
}

const isLoading = ref(false);
const next = () => {
    if(stepCount.value === 1)
        validateInputs('/api/personal-information/store', personalInformationFormData, formErrors);
    if(stepCount.value === 2)
        validateInputs('/api/professional-information/store', professionalInformationFormData, formErrors);
    if(stepCount.value === 3)
        validateInputs('/api/account-access/store', accountAccessFormData, formErrors);
}
const validateInputs = (url, data, errorsForm) => {
    isLoading.value = true;
    axios.post(url, data.value)
        .then(response => {
            if(response.data.success){
                stepCount.value = stepCount.value + 1
                errorsForm.value = {};
            }
        })
        .catch(err => {
            if(err.response){
                errorsForm.value = err.response.data.errors
            }
            else {
                console.log(err)
            }
        }).finally(() => isLoading.value = false);
}
const createEmployee = () => {
    isLoading.value = true;
    const data =  {
        ...personalInformationFormData.value,
        ...professionalInformationFormData.value,
        ...accountAccessFormData.value
    }
    router.post(route('employees.store'), data,{
        onSuccess: page => {
            toast.success('Employee Created Successfully.')
        },
        onError: errors => {
            toast.error('Internal Server Error.')
        },
        onFinish: visit => isLoading.value = false
    })
}

const form = useForm({
    sheet: null,
})

const handleExcelFileUpload = () => {
    const mimes = ['xlsx', 'csv'];
    const type = form.sheet.name.split('.')[1];
    console.log(mimes.includes(type));
    if(form.sheet && !mimes.includes(type)) {
        toast.warning('Only xlsx file is accepted');
        return;
    }
    const notification = push.promise("We're sending your message, hold on...")
    form.post(route('employees.import'), {
        onSuccess: page => notification.resolve('Data has been successfully imported!'),
        onError: err => {
            console.log(err);
            notification.reject(
                'There was an error importing the data. Please try again.'
            )
        }
    });
}

</script>

<template>
    <MainLayout>
        <Notivue v-slot="item">
            <Notification :item="item" />
        </Notivue>
        <Header heading="Add New Employee" subheading="All Employee > Add New Employee"/>
        <div v-if="stepCount === 1" class="flex gap-3">
            <div>
                <form @input.prevent="handleExcelFileUpload" enctype="multipart/form-data">
                    <input type="file" @input="form.sheet = $event.target.files[0]">
                </form>
            </div>
        </div>
        <section class="flex-1">
            <DivFlexCol class="p-5 w-full h-auto rounded-lg border border-gray/20 space-y-5">
                  <DivFlexCenter class="gap-5">
                      <PrimaryButton :icon="user" addClass="bg-transparent">
                          <span class="text-primary-font" :class="{'border-b-2 border-primary' : isActive(1)}">Personal Information</span>
                      </PrimaryButton>
                      <PrimaryButton :icon="briefcase" addClass="bg-transparent">
                          <span class="text-primary-font" :class="{'border-b-2 border-primary' : isActive(2)}">Professional Information</span>
                      </PrimaryButton>
                      <PrimaryButton :icon="lock" addClass="bg-transparent">
                          <span class="text-primary-font" :class="{'border-b-2 border-primary' : isActive(3)}">Account Access</span>
                      </PrimaryButton>
                </DivFlexCenter>
                <PersonalInformation :formData="personalInformationFormData" :formErrors="formErrors" v-if="stepCount === 1"/>
                <ProfessionalInformation :formData="professionalInformationFormData" :formErrors="formErrors" v-if="stepCount === 2"/>
                <AccountAccess :formData="accountAccessFormData" :formErrors="formErrors" v-if="stepCount === 3"/>
                <div class="flex h-full justify-end items-center gap-2 col-span-2">
                    <ButtonLink v-if="stepCount === 1" :href="route('employees.index')">Cancel</ButtonLink>
                    <TransparentButton v-if="stepCount > 1" @click="stepCount = stepCount - 1">Back</TransparentButton>
                    <Button v-if="stepCount < 3" @click="next" :isLoading="isLoading">
                        Next
                    </Button>
                    <Button v-if="stepCount === 3" @click="createEmployee">Add</Button>
                </div>
            </DivFlexCol>
        </section>
    </MainLayout>
</template>
