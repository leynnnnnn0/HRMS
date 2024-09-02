<script setup>

import Input from "@/Components/Form/Input.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";

defineProps({
    edit: {
        type: Boolean,
        default: false
    }
})
</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <DivFlexCol class="gap-1">
            <Label>First Name</Label>
            <Input value="Brooklyn" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Middle Name</Label>
            <Input value="Mariano" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Last Name</Label>
            <Input value="Simmons" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Gender</Label>
            <Input value="Male" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Date of Birth</Label>
            <Input value="08/19/2004" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Email</Label>
            <Input value="brooklyn@hrms.com" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Phone Number</Label>
            <Input value="094324234234" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Street Address</Label>
            <Input value="Gatchalian Subdivision" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Municipality</Label>
            <Input value="Paranaque" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Postal Code</Label>
            <Input value="4104" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>City/Province</Label>
            <Input value="Manila" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
    </div>
</template>

