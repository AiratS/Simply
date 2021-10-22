<template>
  <div class="sign-up">
    <b-form>
      <p class="title">Sign up</p>
      <b-form-group>
        <b-form-input
            :state="false"
            class="sy-input"
            placeholder="Full name"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="false">
          Your user ID must be 5-12 characters long.
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group>
        <b-form-input
            class="sy-input"
            placeholder="Email"
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
      <b-form-group>
        <b-form-input
            class="sy-input"
            type="password"
            placeholder="Repeat password"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="true">
          Your user ID must be 5-12 characters long.
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group class="agree-checkbox">
        <b-form-checkbox>
          Yes, I understand and agree to the workwise Terms & Conditions.
        </b-form-checkbox>
        <b-form-invalid-feedback :state="true">
          Your user ID must be 5-12 characters long.
        </b-form-invalid-feedback>
      </b-form-group>
      <b-button class="sy-btn btn-sign-up" variant="primary">Get started</b-button>
    </b-form>
  </div>
</template>

<script>
import {
  BForm,
  BFormGroup,
  BFormInput,
  BFormCheckbox,
  BFormInvalidFeedback,
  BButton
} from 'bootstrap-vue';

export default {
  name: "SignUp",
  components: {
    BForm,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BFormInvalidFeedback,
    BButton
  }
}
</script>

<style lang="scss" scoped>
  @import '../../../scss/colors';

  .sign-up {
    .title {
      width: fit-content;
      color: #000000;
      font-size: 18px;
      font-weight: 600;
      border-bottom: 2px solid $sy-login-red;
      margin-bottom: 30px;
    }

    .btn-sign-up {
      width: 125px;
      height: 40px;
      margin-top: 18px;
    }

    .agree-checkbox {
      margin-top: 25px;
    }
  }
</style>