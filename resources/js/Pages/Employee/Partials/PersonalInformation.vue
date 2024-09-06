<script setup>

import camera from "@/Images/Icons/camera.svg";
import IconButton from "@/Components/IconButton.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import Input from "@/Components/Form/Input.vue";
import {watch} from "vue";
import Error from "@/Components/Form/Error.vue";

const props = defineProps({
    formData: {
        type: Object,
        required: true
    },
    formErrors: {
        type: Object,
        required: true
    },

})
const emit = defineEmits(['formUpdate']);
watch(props.formData, (newValue) => {
    emit('formUpdate', newValue);
}, {deep: true})

</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <div class="col-span-2">
            <div class="relative w-fit">
                <input type="file" class="cursor-pointer absolute inset-0 opacity-0">
                <IconButton class="size-24" :icon="camera"/>
            </div>
        </div>
        <InputDiv>
            <Label>First Name*</Label>
            <Input v-model="formData.firstName" placeholder="John"/>
            <Error v-if="formErrors && formErrors.firstName">{{ formErrors.firstName[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Middle Name</Label>
            <Input v-model="formData.middleName"/>
            <Error v-if="formErrors.middleName">{{ formErrors.middleName[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Last Name*</Label>
            <Input v-model="formData.lastName" placeholder="Doe"/>
            <Error v-if="formErrors.lastName">{{ formErrors.lastName[0]}}</Error>
        </InputDiv>
        <DivFlexCol class="gap-1">
            <Label>Gender*</Label>
            <select v-model="formData.gender" class="border border-black/10 rounded-lg text-gray-500" name="gender" id="name">
                <option value="">Select</option>
                <option class="text-primary-font" value="Male">Male</option>
                <option class="text-primary-font" value="Female">Female</option>
            </select>
            <Error v-if="formErrors.gender">{{ formErrors.gender[0]}}</Error>
        </DivFlexCol>
        <InputDiv>
            <Label>Date of Birth*</Label>
            <Input v-model="formData.dateOfBirth" type="date"/>
            <Error v-if="formErrors.dateOfBirth">{{ formErrors.dateOfBirth[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Email*</Label>
            <Input v-model="formData.email" placeholder="john@gmail.com"/>
            <Error v-if="formErrors.email">{{ formErrors.email[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Phone Number*</Label>
            <Input v-model="formData.phoneNumber" placeholder="09432532434"/>
            <Error v-if="formErrors.phoneNumber">{{ formErrors.phoneNumber[0]}}</Error>
        </InputDiv>
        <div class="col-span-2 grid grid-cols-3 gap-5">
            <InputDiv class="col-span-3">
                <Label>Street Address*</Label>
                <Input v-model="formData.streetAddress"/>
                <Error v-if="formErrors.streetAddress">{{ formErrors.streetAddress[0]}}</Error>
            </InputDiv>
            <InputDiv>
                <Label>Municipality*</Label>
                <Input v-model="formData.municipality" placeholder="General Trias"/>
                <Error v-if="formErrors.municipality">{{ formErrors.municipality[0]}}</Error>
            </InputDiv>
            <InputDiv>
                <Label>City/Province*</Label>
                <Input v-model="formData.cityOrProvince" placeholder="Cavite"/>
                <Error v-if="formErrors.cityOrProvince">{{ formErrors.cityOrProvince[0]}}</Error>
            </InputDiv>
            <InputDiv>
                <Label>Postal Code*</Label>
                <Input v-model="formData.postalCode" placeholder="4107"/>
                <Error v-if="formErrors.postalCode">{{ formErrors.postalCode[0]}}</Error>
            </InputDiv>
        </div>
    </div>
</template>
