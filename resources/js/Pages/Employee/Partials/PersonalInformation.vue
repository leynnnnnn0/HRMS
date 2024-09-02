<script setup>

import camera from "@/Images/Icons/camera.svg";
import IconButton from "@/Components/IconButton.vue";
import Input from "@/Components/Form/Input.vue";
import InputWithLabel from "@/Components/Form/InputWithLabel.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import Label from "@/Components/Form/Label.vue";
</script>

<template>
    <div class="grid grid-cols-2 gap-5">
        <div class="col-span-2">
            <div class="relative w-fit">
                <input type="file" class="cursor-pointer absolute inset-0 opacity-0">
                <IconButton class="size-24" :icon="camera"/>
            </div>
        </div>
        <InputWithLabel label="First Name*" placeholder="John"/>
        <InputWithLabel label="Middle Name*" />
        <InputWithLabel label="Last Name*" placeholder="Doe"/>
        <DivFlexCol class="gap-1">
            <Label>Gender*</Label>
            <select class="border border-black/10 rounded-lg text-gray-500" name="gender" id="name">
                <option value="">Select</option>
                <option class="text-primary-font" value="Male">Male</option>
                <option class="text-primary-font" value="Female">Female</option>
            </select>
        </DivFlexCol>
        <InputWithLabel label="Date of Birth*" type="date"/>
        <InputWithLabel label="Email*" placeholder="john@gmail.com" type="email"/>
        <InputWithLabel label="Phone Number*" placeholder="09********"/>
        <div class="col-span-2 grid grid-cols-3 gap-5">
            <InputWithLabel label="Street Address*" class="col-span-3"/>
            <InputWithLabel label="Municipality*" placeholder="General Trias"/>
            <InputWithLabel label="City/Province*" placeholder="Cavite"/>
            <InputWithLabel label="Postal Code*" placeholder="4107"/>
        </div>
    </div>
</template>
