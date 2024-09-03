<script setup>

import Input from "@/Components/Form/Input.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";

defineProps({
    accountAccessForm: {
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
            <Label>Access Email</Label>
            <Input v-model="accountAccessForm.accessEmail" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Access Password</Label>
            <Input v-model="accountAccessForm.accessPassword" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
    </div>
</template>
