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
            <Label>Access Email</Label>
            <Input value="simmons@hrms.com" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Access Password</Label>
            <Input value="jfsjfsdfsdf" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
    </div>
</template>
