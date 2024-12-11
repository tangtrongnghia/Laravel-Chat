<template>
  <div class="flex items-center space-x-2 text-cyan-400">
    <div class="font-semibold">
      {{ message.user.name }}
      <!-- <span
        v-if="message.user.id === user.id"
        class="text-cyan-300"
        >(You)</span
      > -->
    </div>
    <div class="text-sm text-gray-400">{{ message.created_at.split(' ')[1] }}:</div>
    <div class="flex-1">
      {{ message.message }}
    </div>
  </div>
</template>

<script setup>
// import { inject } from 'vue'

defineProps({
  message: Object,
})

// const user = inject('currentUserLogin')
</script>
