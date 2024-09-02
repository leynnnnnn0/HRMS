<script setup>
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";

defineProps({
    label: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text"
    },
    placeholder: String
})
</script>

<template>
    <DivFlexCol class="gap-1">
        <Label>{{ label }}</Label>
        <Input :placeholder="placeholder" :type="type"/>
    </DivFlexCol>
</template>

