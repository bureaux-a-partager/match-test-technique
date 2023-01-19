<script>
export default {
};
</script>

<template>
  <div class="login-form">
    <h1>Login Form</h1>
    <form>
      <input id="username-input" type="text" v-model="username" />
      <input id="password-input" type="password" v-model="password" />
      <button
        type="submit"
        id="login-button"
        :disabled="isDisabled"
        @click="onSubmit()"
      >
        Submit
      </button>
    </form>
  </div>
</template>
