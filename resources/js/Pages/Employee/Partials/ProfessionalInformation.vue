<script setup>
import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import {ref, watch} from "vue";
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
    departments: {
        type: Object,
        required: true
    }
})

props.formData.accessEmail = generateAccessEmail();
props.formData.accessPassword = generateAccessPassword();

const emit = defineEmits(['formUpdate']);
watch(props.formData, (newValue) => {
    emit('formUpdate', newValue);
}, {deep: true})
const positions = ref({});
const teams = ref({});
const fetchData = (e) => {
    props.formData.position_id = "";
    props.formData.team_id = "";
    axios.get(`/api/positions?departmentId=${e.target.value}`)
        .then(result => {
            positions.value = result.data.data
        })
        .catch(err => console.log(err))

    axios.get(`/api/teams?departmentId=${e.target.value}`)
        .then(result => {
            teams.value = result.data.data
        })
        .catch(err => console.log(err))
}

</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <InputDiv>
            <Label>Joining Date*</Label>
            <Input v-model="formData.joiningDate" type="date"/>
            <Error v-if="formErrors.joiningDate">{{ formErrors.joiningDate[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Department</Label>
            <Select @change="fetchData" v-model="formData.department_id">
                <option v-for="department in departments" :value="department.id">{{ department.name }}</option>
            </Select>
            <Error v-if="formErrors.department_id">{{ formErrors.department_id[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Position</Label>
            <Select v-model="formData.position_id">
                <option v-for="position in positions" :value="position.id">{{position.name}}</option>
            </Select>
            <Error v-if="formErrors.position_id">{{ formErrors.position_id[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Team</Label>
            <Select v-model="formData.team_id">
                <option v-for="team in teams" :value="team.id">{{team.name}}</option>
            </Select>
            <Error v-if="formErrors.team_id">{{ formErrors.team_id[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Rate per hour</Label>
            <Select v-model="formData.ratePerHour">
                <option value="5">5</option>
                <option value="7">7</option>
                <option value="10">10</option>
            </Select>
            <Error v-if="formErrors.ratePerHour">{{ formErrors.ratePerHour[0]}}</Error>
        </InputDiv>
    </div>
</template>
