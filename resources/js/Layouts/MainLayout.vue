<template>
  <Link href="/">Main Page</Link>&nbsp;
  <Link href="/hello">Show Page</Link>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
  <slot>Default</slot>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import {computed} from 'vue'

const flashSuccess = computed(() => this.$page.props.flash.success)
</script>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
