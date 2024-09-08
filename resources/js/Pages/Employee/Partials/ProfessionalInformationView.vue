<script setup>
import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import {ref, watch} from "vue";

const props = defineProps({
    professionalInformationForm: {
        type: Object,
        required: true
    },
    edit: {
        type: Boolean,
        default: false
    },
    departments: {
        type: Array,
        required: true
    }
})

const positions = ref({});
const teams = ref({});

watch(() => props.professionalInformationForm.department.id, () => {
    axios.get(`/api/positions?departmentId=${props.professionalInformationForm.department.id}`)
        .then(result => {
            positions.value = result.data.data
        })
        .catch(err => console.log(err))

    axios.get(`/api/teams?departmentId=${props.professionalInformationForm.department.id}`)
        .then(result => {
            teams.value = result.data.data
        })
        .catch(err => console.log(err))
}, {immediate: true})


</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <InputDiv>
            <Label>Joining Date</Label>
            <Input v-model="professionalInformationForm.joiningDate" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit"/>
        </InputDiv>
        <InputDiv>
            <Label>Department</Label>
            <Select v-model="professionalInformationForm.department.id" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option v-for="department in departments" :value="department.id">{{ department.name }}</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Position</Label>
            <Select v-model="professionalInformationForm.position.id" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option v-for="position in positions" :value="position.id">{{ position.name }}</option>
            </Select>
        </InputDiv>
        <InputDiv>
            <Label>Team</Label>
            <Select v-model="professionalInformationForm.team.id" :class="{ 'border-none p-0 text-primary-font' : !edit}" :disabled="!edit">
                <option v-for="team in teams" :value="team.id">{{ team.name }}</option>
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
