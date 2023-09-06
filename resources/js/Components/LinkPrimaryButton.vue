<template>
    <a :type="type" class="rounded-md bg-gray-700 px-4 py-2 text-center text-sm text-white hover:bg-gray-500">
        <slot />
    </a>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
