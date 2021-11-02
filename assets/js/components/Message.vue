<template>
  <div class="message">
    <div class="message-profile">
      <div class="message-profile-avatar">
        <img src="../../img/message-item-avatar.png" alt="message-profile-avatar" />
      </div>
      <div class="message-content">
        <p class="message-author">{{ message.author }}</p>
        <p class="message-text">{{ message.text }}</p>
      </div>
    </div>
    <div class="message-info">
      <p class="message-info-time">{{ message.time }}</p>
      <p class="message-info-count">{{ message.count }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Message",
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

.message {
  display: flex;
  width: 100%;
  justify-content: space-around;
  height: 90px;
  padding-top: 10px;
  cursor: pointer;
  background-color: white;
  border-bottom: 1px solid #eeeeee;

  &:hover {
    background-color: $sy-profile-background;
  }

  .message-profile {
    display: flex;

    .message-profile-avatar {
      padding-top: 9px;
    }

    .message-content {
      margin-left: 15px;
    }
  }

  .message-info {
    margin-left: 40px;

    .message-info-time {
      color: #b2b2b2;
      font-size: 14px;
      padding-top: 9px;
      margin-bottom: 4px;
    }

    .message-info-count {
      float: right;
      width: 25px;
      height: 25px;
      border-radius: 100px;
      background-color: #e77667;
      text-align: center;
      line-height: 25px;
      font-size: 13px;
      color: white;
    }
  }
}

.message-author {
  color: black;
  font-size: 18px;
  font-weight: 600;
  padding-top: 9px;
  margin-bottom: 0
}

.message-text {
  color: #686868;
  font-size: 16px;
}
</style>