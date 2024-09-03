<script setup>
import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";

defineProps({
    professionalInformationForm: {
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
            <Input v-model="professionalInformationForm.joiningDate" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Department</Label>
            <Select v-model="professionalInformationForm.department" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="HR">HR</option>
                <option value="Design">Design</option>
                <option value="Developer">Developer</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Position</Label>
            <Select v-model="professionalInformationForm.position" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="Admin">Admin</option>
                <option value="UI Designer">UI Designer</option>
                <option value="Web Developer">Web Developer</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Team</Label>
            <Select v-model="professionalInformationForm.team" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="Allan">Allan</option>
                <option value="Jay">Jay</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Rate per hour</Label>
            <Select v-model="professionalInformationForm.ratePerHour" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option value="5">5</option>
                <option value="7">7</option>
                <option value="10">10</option>
            </Select>
        </InputDiv>
    </div>
</template>
