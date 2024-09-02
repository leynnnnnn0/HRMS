<script setup>
import Input from "@/Components/Form/Input.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";

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
            <Label>Joining Date</Label>
            <Input value="2024-08-21" type="date" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Department</Label>
            <Select :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit" value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Position</Label>
            <Select :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit" value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Team</Label>
            <Select :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit" value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Schedule</Label>
            <Select :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit" value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
    </div>
</template>
