export default axios => ({
  signUp({ email, fullName, password, repeatPassword }) {
    return axios.post('/api/sign-up', {
      email,
      fullName,
      password,
      repeatPassword
    });
  },

  signIn(email, password) {
    return axios.post('/api/login-check', {
      email,
      password
    });
  }
});