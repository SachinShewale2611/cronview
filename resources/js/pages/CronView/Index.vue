<template>
  <div class="p-6">
    <div class="flex items-center mb-4">
      <span class="text-3xl mr-2">🕒</span>
      <h1 class="text-2xl font-bold">CronView Dashboard</h1>
    </div>

    <table class="min-w-full border border-gray-300 rounded-lg shadow-sm">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="p-3 text-left">Command</th>
          <th class="p-3 text-left">Cron Expression</th>
          <th class="p-3 text-left">Readable</th>
          <th class="p-3 text-left">Next Run</th>
          <th class="p-3 text-left">Previous Run</th>
          <th class="p-3 text-left">Description</th>
        </tr>
      </thead>

      <tbody>
        <tr
          v-for="(task, index) in tasks"
          :key="index"
          class="border-t hover:bg-gray-50 transition"
        >
          <td class="p-3 font-mono text-sm">{{ task.command }}</td>
          <td class="p-3 font-mono text-sm">{{ task.expression }}</td>
          <td class="p-3 text-sm text-indigo-700 font-medium">{{ task.readable }}</td>
          <td class="p-3 text-sm">{{ task.next_run }}</td>
          <td class="p-3 text-sm">{{ task.previous_run }}</td>
          <td class="p-3">{{ task.description }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script setup lang="ts">
defineProps({
  tasks: {
    type: Array<any>,
    default: () => [],
  },
})
</script>
