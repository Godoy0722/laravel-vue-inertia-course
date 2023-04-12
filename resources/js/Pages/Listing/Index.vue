<template>
  <div v-for="listing in listings" :key="`listing_${listing.id}`">
    <div>
      <Link :href="`/listings/${listing.id}`">
        <ListingAddress :listing="listing" />
      </Link>
    </div>
    <div>
      <Link :href="`/listings/${listing.id}/edit`">Edit</Link>
    </div>
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import ListingAddress from '@/Components/ListingAddress.vue'
defineProps({
    listings: Array,
})
</script>
