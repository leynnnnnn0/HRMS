<script setup>

import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import Error from "@/Components/Form/Error.vue";
import Select from "@/Components/Form/Select.vue";

defineProps({
    personalInformation: {
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
            <Input :value="personalInformation.firstName" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Middle Name</Label>
            <Input :value="personalInformation.middleName" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Last Name</Label>
            <Input :value="personalInformation.lastName" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Gender</Label>
            <Select :value="personalInformation.gender" :model-value="personalInformation.gender" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Date of Birth</Label>
            <Input :value="personalInformation.dateOfBirth" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Email</Label>
            <Input :value="personalInformation.email" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Phone Number</Label>
            <Input :value="personalInformation.phoneNumber"  :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Street Address</Label>
            <Input :value="personalInformation.streetAddress" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Municipality</Label>
            <Input :value="personalInformation.municipality" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Postal Code</Label>
            <Input :value="personalInformation.postalCode" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>City/Province</Label>
            <Input :value="personalInformation.cityOrProvince" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
    </div>
</template>

