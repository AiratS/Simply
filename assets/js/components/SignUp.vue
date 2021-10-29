<template>
  <div class="sign-up">
    <b-form>
      <p class="title">Sign up</p>
      <b-form-group>
        <b-form-input
            v-model="fullName"
            :state="!$v.fullName.$invalid"
            class="sy-input"
            placeholder="Full name"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="!$v.fullName.$invalid">
            The field value is required
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group>
        <b-form-input
            v-model="email"
            :state="!$v.email.$invalid"
            class="sy-input"
            placeholder="Email"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="!$v.email.$invalid">
          <span v-if="!$v.email.required">
            The field value is required
          </span>
          <span v-else-if="!$v.email.email">
            The field value must an email
          </span>
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group>
        <b-form-input
            v-model="password"
            :state="!$v.password.$invalid"
            class="sy-input"
            type="password"
            placeholder="Password"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="!$v.password.$invalid">
          <span v-if="!$v.password.required">
            The field value is required
          </span>
          <span v-else-if="!$v.password.minLength">
            The field length must min 8
          </span>
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group>
        <b-form-input
            v-model="repeatPassword"
            :state="!$v.repeatPassword.$invalid"
            class="sy-input"
            type="password"
            placeholder="Repeat password"
            required>
        </b-form-input>
        <b-form-invalid-feedback :state="!$v.repeatPassword.$invalid">
          The field must be same
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group class="agree-checkbox">
        <b-form-checkbox
            v-model="isAgree"
            :state="!$v.isAgree.$invalid">
          Yes, I understand and agree to the workwise Terms & Conditions.
        </b-form-checkbox>
      </b-form-group>
      <b-button @click="onSignUp" :disabled="$v.$invalid" class="sy-btn btn-sign-up" variant="primary">
        Get started
      </b-button>
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
import { required, email, minLength, sameAs } from 'vuelidate/lib/validators'
import api from '../api';
import helpers from '../helpers';

export default {
  name: "SignUp",

  components: {
    BForm,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BFormInvalidFeedback,
    BButton,
  },

  data() {
    return {
      fullName: null,
      email: null,
      password: null,
      repeatPassword: null,
      isAgree: false,
    }
  },

  validations: {
    fullName: {
      required,
    },
    email: {
      required,
      email,
    },
    password: {
      required,
      minLength: minLength(8),
    },
    repeatPassword: {
      required,
      sameAs: sameAs('password'),
    },
    isAgree: {
      isTrue: value => true === value,
    }
  },

  methods: {
    onSignUp() {
      helpers.decorateVuelidateError(api.auth.signUp(this.$data), {
        onSuccess: () => {
          // TODO: go to profile
        },
        onError: (serverErrors) => {
          // TODO: combine with client errors
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/colors';

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