<template>
  <main-layout>
    <div class="search">
      <div class="search-text">
        Search results for: <span>{{ 'John' }}</span>
      </div>
      <div class="search-result">
        <search-profile-list :profiles="profiles"></search-profile-list>
      </div>
    </div>
  </main-layout>
</template>

<script>
import MainLayout from "../layouts/MainLayout";
import SearchProfileList from "../components/SearchProfileList";

export default {
  name: "Search",
  components: {
    MainLayout,
    SearchProfileList,
  },

  data() {
    return {
      profiles: [
        {
          fullName: 'John Doe',
          about: 'super cool person',
          avatar: '../'
        },
        {
          fullName: 'John Doe',
          about: 'super cool person',
          avatar: '../'
        },
        {
          fullName: 'John Doe',
          about: 'super cool person',
          avatar: '../'
        },
        {
          fullName: 'John Doe',
          about: 'super cool person',
          avatar: '../'
        },
        {
          fullName: 'John Doe',
          about: 'super cool person',
          avatar: '../'
        },
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/variables';
@import '../../scss/colors';

.search {
  width: $sy-page-width;
  padding-top: 60px;
  padding-bottom: 60px;
  margin-left: auto;
  margin-right: auto;

  .search-text {
    width: 100%;
    background-color: white;
    color: black;
    font-size: 20px;
    font-weight: 600;
    padding: 10px 15px;

    margin-bottom: 25px;

    span {
      font-weight: normal;
    }
  }
}
</style>