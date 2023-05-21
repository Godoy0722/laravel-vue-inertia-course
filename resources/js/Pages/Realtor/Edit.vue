<template>
  <form @submit.prevent="update">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Beds</label>
        <input v-model.number="form.beds" class="input" type="text" />
        <InputErrorMessage :error="form.errors.beds" />
      </div>

      <div class="col-span-2">
        <label class="label">Baths</label>
        <input v-model.number="form.baths" class="input" type="text" />
        <InputErrorMessage :error="form.errors.baths" />
      </div>

      <div class="col-span-2">
        <label class="label">Area</label>
        <input v-model.number="form.area" class="input" type="text" />
        <InputErrorMessage :error="form.errors.area" />
      </div>

      <div class="col-span-4">
        <label class="label">City</label>
        <input v-model="form.city" class="input" type="text" />
        <InputErrorMessage :error="form.errors.city" />
      </div>

      <div class="col-span-2">
        <label class="label">Post Code</label>
        <input v-model="form.code" class="input" type="text" />
        <InputErrorMessage :error="form.errors.code" />
      </div>

      <div class="col-span-4">
        <label class="label">Street</label>
        <input v-model="form.street" class="input" type="text" />
        <InputErrorMessage :error="form.errors.street" />
      </div>

      <div class="col-span-2">
        <label class="label">Street Nr</label>
        <input v-model.number="form.street_nr" class="input" type="text" />
        <InputErrorMessage :error="form.errors.street_nr" />
      </div>

      <div class="col-span-6">
        <label class="label">Price</label>
        <input v-model.number="form.price" class="input" type="text" />
        <InputErrorMessage :error="form.errors.price" />
      </div>

      <div class="col-span-6">
        <button class="btn-primary" type="submit">Edit</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3'
import InputErrorMessage from '@/Components/InputErrorMessage.vue'

const props = defineProps({
    listing: Object,
})

const form = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.street,
    code: props.listing.code,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
})

const update = () => form.put(route('realtor.listing.update', { listing: props.listing.id }))

</script>
