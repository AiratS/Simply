<template>
  <div class="chat-sender-message">
    <div class="chat-sender-message-avatar">
      <div class="chat-sender-message-avatar-cut">
        <img src="../../img/chat-recipient-message-avatar.png" alt="chat-sender-message-avatar" />
      </div>
    </div>
    <div class="chat-sender-message-content">
      <div class="chat-sender-message-text">
        {{ message.text }}
      </div>
      <div class="chat-sender-message-time">
        {{ message.time }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ChatCompanionMessage",
  props: {
    message: {
      type: Object,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
@import '@scss/colors';

.chat-sender-message {
  display: flex;

  .chat-sender-message-content {
    max-width: 375px;
    margin-left: 15px;

    .chat-sender-message-text {
      font-size: 14px;
      line-height: 22px;
      padding: 10px 15px;
      border-radius: 15px;
      background-color: #efefef;
      color: #686868;
    }

    .chat-sender-message-time {
      color: #b2b2b2;
      font-size: 14px;
      text-align: left;
      margin-top: 4px;
    }
  }

  .chat-sender-message-avatar {
    width: 50px;

    .chat-sender-message-avatar-cut {
      width: 50px;
      height: 50px;
      border-radius: 25px;
    }
  }
}
</style>