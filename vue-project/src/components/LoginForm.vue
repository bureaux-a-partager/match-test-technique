<script>
export default {
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    onSubmit() {
      this.$emit("submit", this.username, this.password);
    },
  },
  computed: {
    isDisabled() {
      return !this.username || !this.password;
    },
  },
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
