<template>
  <div class="search-field">
    <b-form-group>
      <b-form-input
          class="sy-input search-input"
          placeholder="Search">
      </b-form-input>
      <b-button class="search-btn">
        <b-icon class="icon" icon="search"></b-icon>
      </b-button>
    </b-form-group>
  </div>
</template>

<script>
import {
  BFormGroup,
  BFormInput,
  BButton,
  BIcon,
  BIconSearch,
} from 'bootstrap-vue';

export default {
  name: "SearchField",
  components: {
    BFormGroup,
    BFormInput,
    BButton,
    BIcon,
    BIconSearch,
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/colors';

.search-field {
  position: relative;
  width: 300px;
  height: 38px;

  .search-input {
    border: none;
    font-size: 12px;
    color: $sy-input-content-grey;
    padding-top: 18px;
    padding-bottom: 18px;
  }

  .search-btn {
    height: 36px;
    background-color: #efefef;
    border-color: #efefef;
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
    position: absolute;
    top: 0;
    right: 0;

    .icon {
      color: $sy-red;
    }
  }
}
</style>