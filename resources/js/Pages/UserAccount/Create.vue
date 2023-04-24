<template>
  <form @submit.prevent="register()">
    <div class="w-1/2 mx-auto">
      <div>
        <label for="name" class="label">Your name</label>
        <input id="name" v-model="form.name" type="text" class="input" />
        <InputErrorMessage :error="form.errors.name" />
      </div>

      <div class="mt-4">
        <label for="email" class="label">E-mail (username)</label>
        <input id="email" v-model="form.email" type="text" class="input" />
        <InputErrorMessage :error="form.errors.email" />
      </div>

      <div class="mt-4">
        <label for="password" class="label">Password</label>
        <input id="password" v-model="form.password" type="password" class="input" />
        <InputErrorMessage :error="form.errors.password" />
      </div>

      <div class="mt-4">
        <label for="password_confirmation" class="label">Password Confirmation</label>
        <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input" />
        <InputErrorMessage :error="form.errors.password_confirmation" />
      </div>

      <div class="mt-4">
        <button class="btn-primary w-full" type="submit">Create Account</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import InputErrorMessage from '@/Components/InputErrorMessage.vue'
import {useForm} from '@inertiajs/vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const register = () => form.post(route('user-account.store'))
</script>
