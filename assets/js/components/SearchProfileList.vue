<template>
  <div class="search-profile-list">
    <search-profile
        v-for="(profile, index) in profiles"
        :key="index"
        :profile="profile"
        class="search-profile"
    ></search-profile>
  </div>
</template>

<script>
import SearchProfile from "../components/SearchProfile";

export default {
  name: "SearchProfileList",
  components: {
    SearchProfile,
  },
  props: {
    profiles: {
      type: Array,
      required: true,
    },
  }
}
</script>

<style lang="scss" scoped>
.search-profile-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;

  .search-profile {
    margin-bottom: 30px;
  }
}
</style>