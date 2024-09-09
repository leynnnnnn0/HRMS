<script setup>

import DivFlexCenter from "@/Components/Divs/DivFlexCenter.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import ButtonLink from "@/Components/ButtonLink.vue";

defineProps({
    department: {
        type: String,
        required: true,
    },
    membersCount: {
        type: String,
        required: true
    },
    to: {
        type: String,
        required: true
    }
})
</script>

<template>
    <DivFlexCol class="overflow-hidden h-96 rounded-lg border border-gray/20 p-5">
        <DivFlexCenter class="justify-between border-b border-gray/20 pb-3">
            <DivFlexCol>
                        <span class="text-lg font-bold">
                            {{ department }}
                        </span>
                <span class="text-xs text-black/50">
                            {{ membersCount }} members
                    </span>
            </DivFlexCol>
            <ButtonLink :href="to" class="cursor-pointer text-primary text-md border-none">View All</ButtonLink>
        </DivFlexCenter>
        <DivFlexCol class="overflow-y-auto divide-y-2 max-h-fit">
            <slot></slot>
        </DivFlexCol>
    </DivFlexCol>
</template>
