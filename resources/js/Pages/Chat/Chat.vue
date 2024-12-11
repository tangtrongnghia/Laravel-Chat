<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Chat</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
          <div
            class="chat relative mx-auto mt-16 flex h-4/5 max-h-[700px] w-[50%] flex-col rounded-xl bg-gray-800 bg-opacity-90 text-white shadow-lg"
          >
            <!-- Chat Title -->
            <div class="chat-title border-b border-gray-600 bg-gray-700 p-4 text-center">
              <h1 class="text-lg font-bold tracking-wide">Chatroom</h1>
            </div>

            <!-- Messages Area -->
            <div class="messages flex-1 overflow-y-auto border-b border-gray-600 bg-gray-900 p-4">
              <div class="messages-content space-y-2">
                <ChatItem
                  v-for="(message, index) in list_messages"
                  :key="index"
                  :message="message"
                ></ChatItem>
              </div>
            </div>

            <!-- Message Box -->
            <div class="message-box flex items-center border-t border-gray-600 bg-gray-700 p-3">
              <input
                type="text"
                v-model="message"
                @keyup.enter="sendMessage"
                class="message-input flex-1 rounded-lg bg-gray-800 px-4 py-2 text-sm text-white placeholder-gray-400 focus:outline-none focus:ring focus:ring-green-400"
                placeholder="Type message..."
              />

              <button
                type="button"
                class="message-submit ml-3 transform rounded-lg bg-green-500 px-4 py-2 text-sm font-bold uppercase text-white transition-transform hover:scale-110 hover:bg-green-600 focus:ring focus:ring-green-400 active:scale-95"
                @click="sendMessage"
              >
                Send
              </button>
            </div>
          </div>

          <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scope>
.messages::-webkit-scrollbar {
  width: 8px;
}
.messages::-webkit-scrollbar-thumb {
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
}
.messages::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(180deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.3));
}
</style>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { onBeforeMount, ref } from 'vue'
import ChatItem from './partials/ChatItem.vue'

const message = ref('')
const list_messages = ref([])

onBeforeMount(() => {
  loadMessage()
})

async function loadMessage() {
  // Fake data for demonstration
  list_messages.value = [
    {
      id: 1,
      user: { id: 1, name: 'Alice' },
      message: 'Hello, how are you?',
      created_at: '2024-12-11 08:30:00',
    },
    {
      id: 2,
      user: { id: 2, name: 'Bob' },
      message: 'I am good, thanks! How about you?',
      created_at: '2024-12-11 08:31:00',
    },
    {
      id: 3,
      user: { id: 1, name: 'Alice' },
      message: 'Doing great! What are you up to?',
      created_at: '2024-12-11 08:32:00',
    },
    {
      id: 4,
      user: { id: 3, name: 'Charlie' },
      message: 'Hey everyone!',
      created_at: '2024-12-11 08:33:00',
    },
  ]
}
</script>
