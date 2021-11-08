<template>
  <div class="chat-view">
    <div class="chat-view-header">
      <div class="chat-view-sender-info">
        <div class="chat-view-sender-avatar">
          <img src="../../img/message-item-avatar.png" alt="chat-view-sender-avatar" />
        </div>
        <div class="chat-view-sender-full-name">
          <p class="full-name">{{ companion.fullName }}</p>
          <p class="network-status">{{ companion.networkStatus }}</p>
        </div>
      </div>
    </div>
    <div class="chat-view-messages">
      <infinite-loading direction="top" @infinite="loadMessages"></infinite-loading>
      <div v-for="(message, index) in messages" :key="index" class="chat-view-message">
        <chat-companion-message
            v-if="message.type === 'sender'"
            :message="message"
            class="chat-sender-message"
        ></chat-companion-message>
        <chat-own-message
            v-else
            :message="message"
            class="chat-recipient-message"
        ></chat-own-message>
      </div>
    </div>
    <div class="chat-view-controls">
      <b-textarea class="chat-view-message-text" placeholder="Type a message here"></b-textarea>
      <b-button class="chat-view-send sy-btn">
        Send
      </b-button>
    </div>
  </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';
import ChatOwnMessage from '@/components/ChatOwnMessage';
import ChatCompanionMessage from '@/components/ChatCompanionMessage';

export default {
  name: "ChatView",
  components: {
    InfiniteLoading,
    ChatOwnMessage,
    ChatCompanionMessage,
  },
  props: {
    companion: {
      type: Object,
      required: true,
    },
    messages: {
      type: Array,
      required: true,
    }
  },
  methods: {
    loadMessages($state) {
      let ms = [
        {
          type: 'sender',
          text: 'hello world',
          time: '5 minutes ago',
          avatar: './avatar.png',
        },
        {
          type: 'recipient',
          text: 'hello world',
          time: '5 minutes ago',
          avatar: './avatar.png',
        },
        {
          type: 'recipient',
          text: 'hello world',
          time: '5 minutes ago',
          avatar: './avatar.png',
        },
      ];

      setTimeout( () => {
        this.messages.push(...ms)
        $state.loaded();
      }, 1000);
    }
  }
}
</script>

<style lang="scss" scoped>
.chat-view {
  position: relative;
  width: 100%;
  background-color: white;

  .chat-view-header {
    position: absolute;
    width: 100%;
    background-color: white;
    opacity: 0.95;
    border-bottom: 1px solid #eaeaea;
    padding: 20px;
    z-index: 1;
    top: 0;
    left: 0;

    .chat-view-sender-info {
      display: flex;
    }
  }

  .chat-view-controls {
    display: flex;
    background-color: #f3f5f7;
    border: 1px solid #eeeeee;
    padding: 25px 20px;

    .chat-view-message-text {
      height: 75px;
      background-color: #fff;
      color: #b2b2b2;
      font-size: 16px;
      border: 1px solid #e6e6e6;
      border-radius: 2px;
      resize: none;
      outline: none;
      box-shadow: none;
      overflow: hidden;
      padding-left: 15px;
      padding-right: 15px;
    }

    .chat-view-send {
      width: 120px;
      height: 45px;
      font-weight: 600;
      border-radius: 2px;
      margin-left: 15px;
    }
  }
}

.chat-view-messages {
  height: 500px;
  overflow-y: scroll;
  background-color: white;
  padding: 150px 25px 25px 25px;

  .chat-view-message {
    clear: both;
    overflow: hidden;
    margin-bottom: 20px;

    .chat-sender-message {
      float: left;
    }

    .chat-recipient-message {
      float: right;
    }
  }
}

.chat-view-sender-avatar {
  width: 50px;
  height: 50px;
  border-radius: 25px;
}

.chat-view-sender-full-name {
  margin-top: 4px;
  margin-left: 15px;
  line-height: 23px;

  .full-name {
    color: #000000;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 0;
  }

  .network-status {
    color: #686868;
    font-size: 16px;
    margin-bottom: 0;
  }
}
</style>