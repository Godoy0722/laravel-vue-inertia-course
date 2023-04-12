<template>
  <Link href="/listings">Listings</Link>&nbsp;
  <Link href="/listings/create">New Listing</Link>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
  <slot>Default</slot>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'

const flashSuccess = computed(() => usePage().props.flash.success)
</script>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
