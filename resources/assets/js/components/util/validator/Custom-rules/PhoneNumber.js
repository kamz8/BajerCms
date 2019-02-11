import { Validator } from 'vee-validate';
import PhoneNumber from 'awesome-phonenumber'

const phoneNumber = {
  getMessage: field => `${field} nie jest prawidłowym numerem telefonu`,
  validate (value) {
    return new Promise(resolve => {
      let phone = new PhoneNumber(value);
      resolve({ valid: phone.isValid() })
    })
  }
}
Validator.extend('phoneNumber', phoneNumber)