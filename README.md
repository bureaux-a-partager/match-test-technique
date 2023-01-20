# PHP test runner

## How to init the project
- ```make up``` to run the docker container

## PHP project
### Where to write your code
Put your code in the ```./php-project/Solution/candidate.php``` and write your solution into the ```solution($A) {}``` function.

### How to test
Test your solutions by running one of:
- ```make test-tiny``` to run your solution against tiny data list
- ```make test-small``` to run your solution against small data list
- ```make test-medium``` to run your solution against medium data list
- ```make test-large``` to run your solution against large data list
- ```make test-custom input=1,2,3,4,5,6``` to run your solution against custom integer list equals to ```[1,2,3,4,5,6]```

## Vue project
### Where to write your code
Put your code into the ```./vue-project/src/components/LoginForm.vue```

### How to test
- You can run the vue app with ```make vue``` and go to http://localhost:5173/
- You can run unit test against LoginForm.vue component with ```make vue-test```
