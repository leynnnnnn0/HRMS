<script setup>

import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import notification from "@/Images/Icons/notification.svg";
import IconButton from "@/Components/IconButton.vue";
import profile from "@/Images/Profile/Profile.png";
import dropDown from "@/Images/Icons/dropDown.svg";

defineProps({
    heading: {
        type: String,
        required: true
    },
    subheading: {
        type: String,
        required: true
    },
})
</script>

<template>
    <DivFlexCenter class="justify-between w-full">
        <DivFlexCol>
            <span class="text-lg font-bold">
                {{ heading}}
            </span>
            <span class="text-xs text-black/50">
                {{subheading}}
            </span>
        </DivFlexCol>
        <DivFlexCenter class="gap-2">
            <IconButton :icon="notification"/>
            <DivFlexCenter class="border border-gray/50 rounded-lg p-1 gap-2">
                <img class="size-8"
                    :src="profile"
                     alt="profile">
                <DivFlexCol class="gap-0">
                    <span class="text-sm font-bold">
                        Robert Allan
                    </span>
                    <span class="text-xs text-black/50">
                        HR Manager
                    </span>
                </DivFlexCol>
                <IconButton :icon="dropDown" class="bg-transparent"/>
            </DivFlexCenter>
        </DivFlexCenter>
    </DivFlexCenter>
</template>
