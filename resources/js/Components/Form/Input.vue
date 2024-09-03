<script setup>
defineProps({
    type: {
        type: String,
        default: "text"
    },
    // v-model is passed with a name of modelValue
    modelValue: {
        type: [String, Number],
        default: ""
    }
});

const emit = defineEmits(['update:modelValue']);
const updateValue = event => {
    emit('update:modelValue', event.target.value);
}
</script>

<template>
    <input :type="type"
           @input="updateValue"
           :value="modelValue"
           class="border border-black/10 rounded-lg">
</template>
