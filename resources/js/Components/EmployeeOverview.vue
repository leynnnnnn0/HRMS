<script setup>

import profile from "@/Images/Profile/Profile.png";
import caretRight from "@/Images/Icons/caretRight.svg";
import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import ButtonLink from "@/Components/ButtonLink.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";

defineProps({
    fullName: {
        type: String,
        required: true
    },
    position: {
        type: String,
        required: true
    },
})
</script>

<template>
    <DivFlexCenter class="justify-between">
        <DivFlexCenter class="py-3 gap-3">
            <img class="size-8 rounded-full" :src="profile" alt="profile">
            <DivFlexCol>
                <span class="text-md">{{ fullName }}</span>
                <Span class="text-xs">
                    {{position}}
                </Span>
            </DivFlexCol>
            </DivFlexCenter>
            <ButtonLink class="border-none">
                <img :src="caretRight" alt="icon">
            </ButtonLink>
    </DivFlexCenter>
</template>
