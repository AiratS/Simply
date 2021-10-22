<template>
  <div class="sign-in">
    <b-form>
      <p class="title">Sign in</p>
      <b-form-group>
        <b-form-input
          class="sy-input"
          placeholder="Username"
          required>
        </b-form-input>
        <b-form-invalid-feedback :state="false">
          Your user ID must be 5-12 characters long.
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group>
        <b-form-input
            class="sy-input"
            type="password"
            placeholder="Password"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="true">
          Your user ID must be 5-12 characters long.
        </b-form-invalid-feedback>
      </b-form-group>
      <b-button class="sy-btn btn-sign-in" variant="primary">Sign in</b-button>
    </b-form>
  </div>
</template>

<script>
import {
  BForm,
  BFormGroup,
  BFormInput,
  BFormInvalidFeedback,
  BButton
} from 'bootstrap-vue';

export default {
  name: "SignIn",
  components: {
    BForm,
    BFormGroup,
    BFormInput,
    BFormInvalidFeedback,
    BButton
  }
}
</script>

<style lang="scss" scoped>
  @import '../../../scss/colors';

  .sign-in {
    .title {
      width: fit-content;
      color: #000000;
      font-size: 18px;
      font-weight: 600;
      border-bottom: 2px solid $sy-login-red;
      margin-bottom: 30px;
    }

    .btn-sign-in {
      width: 100px;
      height: 40px;
      margin-top: 18px;
    }
  }
</style>