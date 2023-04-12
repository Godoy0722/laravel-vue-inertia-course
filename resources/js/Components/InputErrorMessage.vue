<template>
  <div v-if="error">
    {{ error }}
  </div>
</template>

<script setup>
defineProps({
    error: [String, Boolean],
})
</script>


