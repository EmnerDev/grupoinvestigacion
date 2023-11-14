<script setup>
const props = defineProps({
  for: String,
  required: Boolean,
});
</script>
<template>
  <label
    class="mb-1 inline-block text-xs font-semibold text-gray-500"
    :for="props.for"
  >
    <slot /><span
      class="text-red-600"
      v-if="props.required"
    >
      *</span
    >
  </label>
</template>