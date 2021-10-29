<template>
  <div class="post">
    <div class="post-header">
      <div class="post-info">
        <div class="post-avatar">
          <img src="../../img/post-avatar.png" alt="post-avatar" />
        </div>
        <div class="post-info-data">
          <p class="post-author">
            {{ post.author }}
          </p>
          <p class="post-time">
            <img src="../../img/clock.png" alt="clock" />
            {{ post.time }}
          </p>
        </div>
      </div>
      <post-control class="post-control"></post-control>
    </div>
    <div class="post-content">
      {{ post.content }}
    </div>
  </div>
</template>

<script>
import PostControl from "../components/PostControl";

export default {
  name: "Post",
  components: {
    PostControl,
  },
  props: {
    post: {
      type: Object,
      required: true,
    }
  }
}
</script>

<style lang="scss" scoped>
$post-border-grey: #e4e4e4;

.post {
  width: 100%;
  box-shadow: 0 2px $post-border-grey;
  border: 1px solid $post-border-grey;
  background-color: white;
  padding: 20px;

  .post-header {
    display: flex;
    justify-content: space-between;

    .post-info {
      display: flex;
    }
  }

  .post-content {
    margin-top: 15px;
  }
}

.post-info-data {
  margin-left: 15px;

  .post-author {
    color: #000000;
    font-size: 18px;
    text-transform: capitalize;
    font-weight: 600;
    margin-bottom: 0;
  }

  .post-time {
    color: #b2b2b2;
    font-size: 14px;
  }
}
</style>