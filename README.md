# UBIQ TEST
## PHP test

### Task description
An array A consisting of N integers is given. The elements of array A together represent a chain, and each element represents the strength of each link in the chain. We want to divide this chain into three smaller chains.

All we can do is to break the chain in exactly two non-adjacent positions. More precisely, we should break links P, Q (0 < P < Q < N − 1, Q − P > 1), resulting in three chains [0, P − 1], [P + 1, Q − 1], [Q + 1, N − 1]. The total cost of this operation is equal to A[P] + A[Q].

For example, consider array A such that:
```
  A[0] = 5
  A[1] = 2
  A[2] = 4
  A[3] = 6
  A[4] = 3
  A[5] = 7
```

We can choose to break the following links:
```
  (1, 3): total cost is 2 + 6 = 8 
  (1, 4): total cost is 2 + 3 = 5 
  (2, 4): total cost is 4 + 3 = 7
```

Write a function:
function solution($A); (into ```./php-project/Solutions/candidate.php```)
that, given an array A of N integers, returns the minimal cost of dividing chain into three pieces.
For example, given:
```
  A[0] = 5
  A[1] = 2
  A[2] = 4
  A[3] = 6
  A[4] = 3
  A[5] = 7
```

the function should return 5, as explained above.
Write an ecient algorithm for the following assumptions: N is an integer within the range [5..100,000]; each element of array A is an integer within the range [1..1,000,000,000].

### Test my solution
In order to test your solution you can:
 - Run containers with ```make up```
 - ```make test-tiny``` to run your solution against tiny data list
 - ```make test-small``` to run your solution against small data list
 - ```make test-medium``` to run your solution against medium data list
 - ```make test-large``` to run your solution against large data list
 - ```make test-custom input=1,2,3,4,5,6``` to run your solution against custom integer list equals to ```[1,2,3,4,5,6]```

## Vue test
### Task description
Your task is to create a simple login form component in Vue.
The form should consist of two input fields: one for username and one for password. Each input should update its value attribute on input change.

There should also be a Submit button. It should emit the submit event when clicked.
The onSubmit listener is dened in the parent component and accepts two parameters: username and password (in that order).
When the Submit button is clicked, the submit event should be emitted with $emit.
The application uses Vue 3.

Requirements
- Create an input element for the username eld. It should have its id set to username-input and type attribute set to text.
- The username input should update its value attribute on being changed with the entered username.
- Create an input element for the password eld. It should have its id set to password-input and type attribute set to password.
- The password input should update its value attribute on being changed with the entered password.
- Create a Submit button with its id set to login-button.
- The Submit button should be disabled (disabled attribute set to true) until both username and password fields are lled.
- The submit event should be emitted when the Submit button is clicked.
- The submit event should be emitted with username and password passed as parameters.

The styling and layout of the components is not assessed. Place them within the main div in the provided starting code. Wrapping inputs and the Submit button in the form element is not needed.

Please use function approach to dene the data in the component (as provided in the initial code)

### Test solution
In order to test your solution, you can:
 - Run containers with ```make up``` (if not already done in previous task)
 - Run unit test against your solution with: ```make vue-test```
 - Run the vue app in browser with ```make vue``` (this will serve vue app on http://localhost:5173)