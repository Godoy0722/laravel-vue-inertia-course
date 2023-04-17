<template>
  <div v-if="error" class="input-error-msg">
    {{ error }}
  </div>
</template>

<script setup>
defineProps({
    error: [String, Boolean],
})
</script>


