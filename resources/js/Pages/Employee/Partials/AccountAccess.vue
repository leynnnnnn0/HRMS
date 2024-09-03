<script setup>

import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import {watch} from "vue";
import Error from "@/Components/Form/Error.vue";
import {useEmployeeForm} from "@/Composables/useEmployeeForm.js";

const { generateAccessEmail, generateAccessPassword} = useEmployeeForm();

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

props.formData.accessEmail = generateAccessEmail();
props.formData.accessPassword = generateAccessPassword();

const emit = defineEmits(['formUpdate']);
watch(props.formData, (newValue) => {
    emit('formUpdate', newValue);
}, {deep: true})

</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <InputDiv>
            <Label>Access Email*</Label>
            <Input v-model="formData.accessEmail" disabled/>
            <Error v-if="formErrors.accessEmail">{{ formErrors.accessEmail[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Access Password*</Label>
            <Input v-model="formData.accessPassword" disabled/>
            <Error v-if="formErrors.accessPassword">{{ formErrors.accessPassword[0]}}</Error>
        </InputDiv>
    </div>
</template>
