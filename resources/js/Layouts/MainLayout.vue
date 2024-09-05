<script setup>
import SideMenu from "@/Components/SideMenu.vue";
import DivFlexCol from "@/Components/Divs/DivFlexCol.vue";
import {Notification, NotificationProgress, Notivue} from "notivue";
import Button from "@/Components/Button.vue";

</script>

<template>
    <div class="flex min-h-screen p-4 text-primary-font">
        <Notivue v-slot="item">
            <Notification v-if="item.props.promise" :item="item">
                <NotificationProgress :item="item"/>
            </Notification>
            <Notification v-else-if="item.props.result" :item="item">
                <NotificationProgress :item="item"/>
            </Notification>
        </Notivue>
        <SideMenu/>
        <DivFlexCol class="p-5 w-full space-y-10">
            <slot></slot>
        </DivFlexCol>
    </div>
</template>
