<template>
  <div class="flex items-center space-x-2 text-cyan-400">
    <div class="font-semibold">
      {{ message.user.name }}
      <span
        v-if="message.user.id === user.id"
        class="text-cyan-300"
        >(me)</span
      >
    </div>
    <div
      class="text-sm text-gray-400"
      :title="message.created_at"
    >
      {{ message.created_at.split(' ')[1] }}:
    </div>
    <div class="flex-1">
      {{ message.message }}
    </div>
  </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'

defineProps({
  message: Object,
})

const user = usePage().props.auth.user
</script>
