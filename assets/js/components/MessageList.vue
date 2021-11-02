<template>
  <div class="message-list">
    <div class="message-list-header">
      Messages
    </div>
    <div class="message-list-content">
      <message
          v-for="(message, index) in messages"
          :key="index"
          :message="message"
      ></message>
    </div>
  </div>
</template>

<script>
import Message from '../components/Message';

export default {
  name: "MessageList",
  components: {
    Message,
  },
  props: {
    messages: {
      type: Array,
      required: true,
    }
  }
}
</script>

<style lang="scss" scoped>
.message-list {
  width: 380px;

  .message-list-header {
    height: 91px;
    background-color: white;
    color: #000000;
    font-size: 18px;
    font-weight: 600;
    border-bottom: 1px solid #eeeeee;
    padding-top: 30px;
    padding-left: 20px;
  }
}
</style>