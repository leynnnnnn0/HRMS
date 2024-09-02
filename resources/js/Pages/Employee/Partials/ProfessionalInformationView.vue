<script setup>

import camera from "@/Images/Icons/camera.svg";
import IconButton from "@/Components/IconButton.vue";
import TransparentButton from "@/Components/TransparentButton.vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Form/Input.vue";
import InputWithLabel from "@/Components/Form/InputWithLabel.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
import Select from "@/Components/Form/Select.vue";
</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <DivFlexCol class="gap-1">
            <Label>Joining Date</Label>
            <Input value="2024-08-21" type="date" class="border-none p-0 text-primary-font" disabled/>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Department</Label>
            <Select class="border-none p-0 text-primary-font" disabled value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Position</Label>
            <Select class="border-none p-0 text-primary-font" disabled value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Team</Label>
            <Select class="border-none p-0 text-primary-font" disabled value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Schedule</Label>
            <Select class="border-none p-0 text-primary-font" disabled value="Web Developer">
                <option value="Web Developer">Web Developer</option>
            </Select>
        </DivFlexCol>
    </div>
</template>
