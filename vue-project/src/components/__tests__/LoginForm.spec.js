import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import LoginForm from '../LoginForm.vue'

describe('LoginForm', () => {
  it('renders inputs and button', async () => {
    const wrapper = mount(LoginForm)
    // Elements exists with right type
    expect(wrapper.get('#username-input[type="text"]')).toHaveProperty('element');
    expect(wrapper.get('#password-input[type="password"]')).toHaveProperty('element');

    expect(wrapper.get('#login-button[type="submit"]')).toHaveProperty('element');
    expect(wrapper.get('#login-button').element.getAttribute('disabled')).not.toBeNull();
  })

  it('button is not disabled with username & password', () => {
    const wrapper = mount(LoginForm, {
      data() {
        return {username: "user", password: "pass"};
      }
    })
    expect(wrapper.get('#login-button').element.getAttribute('disabled')).toBeNull("element")
  })

  it('emit event on click button', async () => {
    const wrapper = mount(LoginForm, {
      data() {
        return {username: "user", password: "pass"};
      }
    })
    wrapper.get('#login-button').trigger('click')
    expect(wrapper.emitted().submit).toBeTruthy()
    expect(wrapper.emitted().submit[0][0]).to.equals('user')
    expect(wrapper.emitted().submit[0][1]).to.equals('pass')
  })
})
