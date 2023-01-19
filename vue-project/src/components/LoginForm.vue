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
    </form>
  </div>
</template>
