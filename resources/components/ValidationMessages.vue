<!-- ValidationMessages.vue -->
<template>
  <div v-if="Object.keys(messages).length">
    <ul>
      <li v-for="(messageList, field) in messages" :key="field">
        <strong>{{ field }}:</strong>
        <ul>
          <li v-for="message in messageList" :key="message">{{ message }}</li>
        </ul>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    messages: {
      type: Object,
      default: () => ({})
    }
  }
};
</script>