<template>
  <form @submit.prevent="update">
    <div>
      <div>
        <label>Beds</label>
        <input v-model.number="form.beds" type="text" />
        <InputErrorMessage :error="form.errors.beds" />
      </div>

      <div>
        <label>Baths</label>
        <input v-model.number="form.baths" type="text" />
        <InputErrorMessage :error="form.errors.baths" />
      </div>

      <div>
        <label>Area</label>
        <input v-model.number="form.area" type="text" />
        <InputErrorMessage :error="form.errors.area" />
      </div>

      <div>
        <label>City</label>
        <input v-model="form.city" type="text" />
        <InputErrorMessage :error="form.errors.city" />
      </div>

      <div>
        <label>Post Code</label>
        <input v-model="form.code" type="text" />
        <InputErrorMessage :error="form.errors.code" />
      </div>

      <div>
        <label>Street</label>
        <input v-model="form.street" type="text" />
        <InputErrorMessage :error="form.errors.street" />
      </div>

      <div>
        <label>Street Nr</label>
        <input v-model.number="form.street_nr" type="text" />
        <InputErrorMessage :error="form.errors.street_nr" />
      </div>

      <div>
        <label>Price</label>
        <input v-model.number="form.price" type="text" />
        <InputErrorMessage :error="form.errors.price" />
      </div>

      <div>
        <button type="submit">Edit</button>
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

const update = () => form.put(route('listings.update', { listing: props.listing.id }))

</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
