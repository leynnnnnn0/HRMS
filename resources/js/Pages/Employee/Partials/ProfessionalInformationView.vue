<script setup>
import Input from "@/Components/Form/Input.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";

defineProps({
    professionalInformation: {
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
            <Label>Joining Date</Label>
            <Input :value="professionalInformation.joiningDate" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Department</Label>
            <Select :value="professionalInformation.department" :model-value="professionalInformation.department" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="HR">HR</option>
                <option value="Design">Design</option>
                <option value="Developer">Developer</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Position</Label>
            <Select :value="professionalInformation.position" :model-value="professionalInformation.position" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="Admin">Admin</option>
                <option value="UI Designer">UI Designer</option>
                <option value="Web Developer">Web Developer</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Team</Label>
            <Select :value="professionalInformation.team" :model-value="professionalInformation.position" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="Allan">Allan</option>
                <option value="Jay">Jay</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Rate per hour</Label>
            <Select :value="professionalInformation.ratePerHour" :model-value="professionalInformation.position" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="5">5</option>
                <option value="7">7</option>
                <option value="10">10</option>
            </Select>
        </InputDiv>
    </div>
</template>
