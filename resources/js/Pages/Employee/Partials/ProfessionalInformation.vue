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
        <InputWithLabel label="Joining Date*" type="date"/>
        <DivFlexCol class="gap-1">
            <Label>Department</Label>
            <Select>

            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Position</Label>
            <Select>

            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Team</Label>
            <Select>

            </Select>
        </DivFlexCol>
        <DivFlexCol class="gap-1">
            <Label>Schedule</Label>
            <Select>

            </Select>
        </DivFlexCol>
    </div>
</template>
