<template>
  <div class="sign-in">
    <b-form>
      <p class="title">Sign in</p>
      <b-form-group>
        <unified-error-wrapper :errors="errors.email">
          <b-form-input
              v-model="email"
              :state="!errors.email.$invalid"
              @input="clearServerError('email')"
              class="sy-input"
              placeholder="Email"
              required>
          </b-form-input>
        </unified-error-wrapper>
      </b-form-group>
      <b-form-group>
        <unified-error-wrapper :errors="errors.password">
          <b-form-input
              v-model="password"
              :state="!errors.password.$invalid"
              @input="clearServerError('password')"
              class="sy-input"
              type="password"
              placeholder="Password"
              required>
          </b-form-input>
        </unified-error-wrapper>
      </b-form-group>
      <b-form-invalid-feedback :state="!authError">
        {{ authError }}
      </b-form-invalid-feedback>
      <b-button @click="onSignIn" :disabled="errors.$invalid" class="sy-btn btn-sign-in" variant="primary">
        Sign in
      </b-button>
    </b-form>
  </div>
</template>

<script>
import { required, email } from 'vuelidate/lib/validators'
import UnifiedErrorMixin from '@/mixins/UnifiedErrorMixin';
import UnifiedErrorWrapper from '@/components/UnifiedErrorWrapper';
import api from '@/api';
import helpers from '@/helpers';

export default {
  name: "SignIn",
  mixins: [
    UnifiedErrorMixin,
  ],
  components: {
    UnifiedErrorWrapper,
  },
  data() {
    return {
      email: null,
      password: null,
      authError: null,
    };
  },
  validations: {
    email: {
      required,
      email,
    },
    password: {
      required,
    },
  },
  methods: {
    onSignIn() {
      this.authError = null;
      helpers.decorateVuelidateError(api.auth.signIn(this.email, this.password), {
        onSuccess: () => {
          this.$router.push({ name: 'profile' });
        },
        onError: (serverErrors) => {
          if (serverErrors.hasOwnProperty('symfonyValidator')) {
            this.serverErrors = serverErrors;
            return;
          }

          this.authError = 'Incorrect login or password';
          this.resetFields();
        }
      });
    },
    resetFields() {
      this.email = null;
      this.password = null;
    }
  }
}
</script>

<style lang="scss" scoped>
@import '@scss/colors';

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