<template>
  <main-layout>
    <div class="messages">
      <div class="messages-conversations">
        <message-list :messages="conversations"></message-list>
      </div>
      <div class="messages-chat">
        <chat-view
          :companion="companion"
          :messages="messages"
        ></chat-view>
      </div>
    </div>
  </main-layout>
</template>

<script>
import MainLayout from "../layouts/MainLayout";
import MessageList from '../components/MessageList';
import ChatView from '../components/ChatView';

export default {
  name: "Messages",
  components: {
    MainLayout,
    MessageList,
    ChatView,
  },
  data() {
    return {
      companion: {
        fullName: 'John John',
        networkStatus: 'Online',
      },
      messages: [
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
      ],
      conversations: [
        {
          author: 'John Doe',
          text: 'Hello Amigo? Como estas',
          time: '1:55 PM',
          count: 3,
        },
        {
          author: 'John Doe',
          text: 'Hello Amigo? Como estas',
          time: '1:55 PM',
          count: 3,
        },
        {
          author: 'John Doe',
          text: 'Hello Amigo? Como estas',
          time: '1:55 PM',
          count: 3,
        },
        {
          author: 'John Doe',
          text: 'Hello Amigo? Como estas',
          time: '1:55 PM',
          count: 3,
        },
      ],
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/variables';

.messages {
  width: $sy-page-width;
  margin-left: auto;
  margin-right: auto;
  padding-top: 60px;
  padding-bottom: 60px;
  display: flex;

  .messages-chat {
    width: 100%;
    margin-left: 1px;
  }
}
</style>