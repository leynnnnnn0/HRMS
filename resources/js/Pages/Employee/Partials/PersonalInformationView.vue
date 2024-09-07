<script setup>

import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import Select from "@/Components/Form/Select.vue";

const props = defineProps({
    personalInformationForm: {
        type: Object,
        required: true
    },
    edit: {
        type: Boolean,
        default: false
    }
})

</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <InputDiv>
            <Label>First Name</Label>
            <Input v-model="personalInformationForm.firstName" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Middle Name</Label>
            <Input v-model="personalInformationForm.middleName" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Last Name</Label>
            <Input v-model="personalInformationForm.lastName" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Gender</Label>
            <Select v-model="personalInformationForm.gender" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Date of Birth</Label>
            <Input type="date" v-model="personalInformationForm.dateOfBirth" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Email</Label>
            <Input v-model="personalInformationForm.email" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Phone Number</Label>
            <Input v-model="personalInformationForm.phoneNumber" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Street Address</Label>
            <Input v-model="personalInformationForm.streetAddress" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Municipality</Label>
            <Input v-model="personalInformationForm.municipality" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Postal Code</Label>
            <Input v-model="personalInformationForm.postalCode" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>City/Province</Label>
            <Input v-model="personalInformationForm.cityOrProvince" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
    </div>
</template>

