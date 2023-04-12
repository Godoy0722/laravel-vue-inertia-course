<template>
  <form @submit.prevent="create">
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
        <button type="submit">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3'
import InputErrorMessage from '@/Components/InputErrorMessage.vue'

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: null,
    street: null,
    code: null,
    street_nr: null,
    price: 0,
})

const create = () => form.post('/listings')
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
