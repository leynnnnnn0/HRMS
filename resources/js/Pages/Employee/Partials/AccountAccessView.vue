<script setup>

import InputWithLabel from "@/Components/Form/InputWithLabel.vue";
import Input from "@/Components/Form/Input.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <DivFlexCol class="gap-1">
            <Label>Access Email</Label>
            <Input value="simmons@hrms.com" class="border-none p-0 text-primary-font" disabled/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Access Password</Label>
            <Input value="jfsjfsdfsdf" class="border-none p-0 text-primary-font" disabled/>
        </DivFlexCol>
    </div>
</template>
