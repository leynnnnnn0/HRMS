<script setup>
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";

const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
        validator: (value) => ['text', 'number', 'email', 'password', 'date'].includes(value)
    },
    placeholder: String,
    modelValue: {
        type: String,
        default: ""
    }
})

const emit = defineEmits(['update:modelValue']);

const handleInput = (event) => {
    emit('update:modelValue', event);
}


</script>

<template>
    <DivFlexCol class="gap-1">
        <Label>{{ label }}</Label>
        <Input :placeholder="placeholder" :type="type" :value="modelValue" @input="handleInput"/>
    </DivFlexCol>
</template>

