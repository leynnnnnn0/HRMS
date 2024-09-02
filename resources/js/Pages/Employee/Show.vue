<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Header from "@/Components/Header.vue";
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import Span from "@/Components/Text/Span.vue";
import profile from "@/Images/Profile/Profile.png";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import editPlain from "@/Images/Icons/editPlain.svg";
import userPlain from "@/Images/Icons/userPlain.svg";
import briefcase from "@/Images/Icons/briefcase.svg";
import lock from "@/Images/Icons/lock.svg";
import user from "@/Images/Icons/user.svg";
import {ref} from "vue";
import PersonalInformationView from "@/Pages/Employee/Partials/PersonalInformationView.vue";
import ProfessionalInformationView from "@/Pages/Employee/Partials/ProfessionalInformationView.vue";
import AccountAccessView from "@/Pages/Employee/Partials/AccountAccessView.vue";
import TransparentButton from "@/Components/TransparentButton.vue";
import Button from "@/Components/Button.vue";


const stepCount = ref(1);
const isActive = (display) => {
    return stepCount.value === display;
}

const editProfile = ref(false);


</script>

<template>
    <MainLayout>
        <Header heading="Brooklyn Simmons" subheading="All Employees > Brooklyn Simmons"/>
        <section class="flex-1">
            <DivFlexCol class="p-5 w-full h-full rounded-lg border border-gray/20 space-y-5">
                <DivFlexCenter class="border-b border-gray-200 pb-3 justify-between">
                    <DivFlexCenter class="gap-3">
                        <img :src="profile" alt="profile" class="size-20">
                        <DivFlexCol>
                            <h1 class="text-lg font-bold">Brooklyn Simmons</h1>
                            <Span class="text-xl">Project Manager</Span>
                            <Span class="text-xl">brooklyn@hrms.com</Span>
                        </DivFlexCol>
                    </DivFlexCenter>
                    <PrimaryButton v-if="!editProfile" @click="editProfile = true" :icon="editPlain">Edit Profile</PrimaryButton>
                    <DivFlexCenter v-if="editProfile" class="gap-3">
                        <TransparentButton @click="editProfile = false">Cancel</TransparentButton>
                        <Button>Save Changes</Button>
                    </DivFlexCenter>
                </DivFlexCenter>

                <div class="flex h-full gap-5">
                    <section class="w-48">
                        <div class="w-full h-48 border border-gray-200 bg-white rounded-lg">
                            <PrimaryButton :icon="userPlain" class="w-full">Profile</PrimaryButton>
                        </div>
                    </section>
                    <DivFlexCol class="flex-1 space-y-6">
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

                        <PersonalInformationView :edit="editProfile" v-if="stepCount === 1"/>
                        <ProfessionalInformationView :edit="editProfile" v-if="stepCount === 2"/>
                        <AccountAccessView :edit="editProfile" v-if="stepCount === 3"/>
                    </DivFlexCol>
                </div>
            </DivFlexCol>
        </section>
    </MainLayout>
</template>
