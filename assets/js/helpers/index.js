export default {
  decorateVuelidateError(promise, { onSuccess, onError, onFinally }) {
    onSuccess = onSuccess || (response => {});
    onFinally = onFinally || (() => {});

    promise
      .then(onSuccess)
      .catch(error => {
        let response = error.response;
        let vuelidateErrors = response.hasOwnProperty('data') && response.data.hasOwnProperty('violations')
          ? this.toVuelidateErrors(response.data.violations)
          : null;

        onError(vuelidateErrors, error);
      })
      .finally(onFinally);
  },
  toVuelidateErrors(violations) {
    let vuelidateErrors = [];
    violations.forEach(violation => {
      let field = violation.propertyPath;
      if (!vuelidateErrors.hasOwnProperty(field)) {
        vuelidateErrors[field] = {
          $invalid: true,
          server: true,
          serverError: violation.message,
          serverErrorsList: [
            violation.message
          ]
        };
      } else {
        vuelidateErrors[field]
          .serverErrorsList
          .push(violation.message);
      }
    });

    return vuelidateErrors;
  },
};