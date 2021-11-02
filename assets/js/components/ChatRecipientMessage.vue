<template>
  <div class="chat-recipient-message">
    <div class="chat-recipient-message-content">
      <div class="chat-recipient-message-text">
        {{ message.text }}
      </div>
      <div class="chat-recipient-message-time">
        {{ message.time }}
      </div>
    </div>
    <div class="chat-recipient-message-avatar">
      <div class="chat-recipient-message-avatar-cut">
        <img src="../../img/chat-recipient-message-avatar.png" alt="chat-recipient-message-avatar" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ChatRecipientMessage",
  props: {
    message: {
      type: Object,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
@import '../../scss/colors';

.chat-recipient-message {
  display: flex;

  .chat-recipient-message-content {
    max-width: 375px;

    .chat-recipient-message-text {
      background-color: $sy-red;
      font-size: 14px;
      line-height: 22px;
      padding: 10px 35px;
      color: white;
      border-radius: 15px;
    }

    .chat-recipient-message-time {
      color: #b2b2b2;
      font-size: 14px;
      text-align: right;
      margin-top: 4px;
    }
  }

  .chat-recipient-message-avatar {
    position: relative;
    width: 50px;
    margin-left: 15px;

    .chat-recipient-message-avatar-cut {
      position: absolute;
      bottom: 24px;
      width: 50px;
      height: 50px;
      border-radius: 25px;
    }
  }
}
</style>