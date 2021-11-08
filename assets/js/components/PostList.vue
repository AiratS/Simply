<template>
  <div class="post-list">
    <post
        v-for="(post, index) in posts"
        :key="index"
        :post="post"
        class="post"
    ></post>
  </div>
</template>

<script>
import Post from '@/components/Post';

export default {
  name: "PostList",
  components: {
    Post,
  },
  props: {
    posts: {
      type: Array,
      required: true,
    }
  }
}
</script>

<style lang="scss" scoped>
.post {
  margin-bottom: 25px;
}
</style>