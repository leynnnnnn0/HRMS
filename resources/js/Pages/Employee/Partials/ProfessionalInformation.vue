<script setup>
import Input from "@/Components/Form/Input.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";
import InputDiv from "@/Components/Form/InputDiv.vue";
import {watch} from "vue";
import Error from "@/Components/Form/Error.vue";

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
const emit = defineEmits(['formUpdate']);
watch(props.formData, (newValue) => {
    emit('formUpdate', newValue);
}, {deep: true})

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
            <Select v-model="formData.department">
                <option value="HR">HR</option>
                <option value="Design">Design</option>
                <option value="Developer">Developer</option>
            </Select>
            <Error v-if="formErrors.department">{{ formErrors.department[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Position</Label>
            <Select v-model="formData.position">
                <option value="Admin">Admin</option>
                <option value="UI Designer">UI Designer</option>
                <option value="Web Developer">Web Developer</option>
            </Select>
            <Error v-if="formErrors.position">{{ formErrors.position[0]}}</Error>
        </InputDiv>
        <InputDiv>
            <Label>Team</Label>
            <Select v-model="formData.team">
                <option value="Allan">Allan</option>
                <option value="Jay">Jay</option>
            </Select>
            <Error v-if="formErrors.team">{{ formErrors.team[0]}}</Error>
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
