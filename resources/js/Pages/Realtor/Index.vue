<template>
  <h1 class="text-3xl mb-4">Your Listings</h1>

  <section class="mb-4">
    <RealtorFilters :filters="filters" />
  </section>

  <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings.data" :key="`listing_${listing.id}`">
      <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
        <div>
          <div class="xl:flex items-center gap-2">
            <Price :price="listing.price" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>

          <ListingAddress :listing="listing" class="text-gray-500" />
        </div>
        <div class="flex item-center gap-1 text-gray-600 dark:text-gray-300">
          <Link class="link-btn" as="button">Preview</Link>
          <Link class="link-btn" as="button">Edit</Link>
          <Link
            class="link-btn"
            :href="route('realtor.listing.destroy', { listing: listing.id })"
            method="DELETE"
            as="button"
          >
            Delete
          </Link>
        </div>
      </div>
    </Box>
  </section>

  <section v-if="listings.data.length" class="w-full flex justify-center my-4">
    <Pagination :links="listings.links" />
  </section>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
import Price from '@/Components/Price.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import RealtorFilters from '@/Pages/Realtor/Components/RealtorFilters.vue'
import Pagination from '@/Components/UI/Pagination.vue'

defineProps({
    listings: Object,
    filters: Object,
})
</script>

<style scoped>
.link-btn {
    @apply btn-outline text-xs font-medium;
}
</style>
