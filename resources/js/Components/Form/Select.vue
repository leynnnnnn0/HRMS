<script setup>
defineProps({
    modelValue: {
        type: [Number, String],
        required: true
    }
})

const emit = defineEmits(['update:modelValue']);
const updateValue = event => {
    emit('update:modelValue', event.target.value);
}
</script>
<template>
    <select @change="updateValue"  class="border border-black/10 rounded-lg text-gray-500" :value="modelValue" :model-value="modelValue">
        <option value="">Select</option>
        <slot></slot>
    </select>
</template>

