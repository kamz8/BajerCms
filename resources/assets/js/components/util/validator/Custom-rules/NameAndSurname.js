import { Validator } from 'vee-validate';

const nameAndSurname = {
  getMessage: field => `${field} nie jest prawidłowym imieniem i nazwiskiem`,
  validate (value) {
    return new Promise(resolve => {
      resolve({ valid: '' })
    })
  }
}
Validator.extend('nameAndSurname', nameAndSurname)