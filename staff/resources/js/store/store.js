import {createStore} from 'vuex';
import staff from './modules/staff/staff.js';
import ban_staff from './modules/staff/ban.js';
import role from './modules/staff/role.js';
import account from './modules/core/account.js';
import customer from './modules/core/customer.js';
import transaction from './modules/core/transaction.js';
import ban from './modules/core/ban.js';
import rate from './modules/credit/rate.js';
import credit from './modules/credit/credit.js';
import user from './modules/auth/user.js';

const store = createStore({
  modules: {
      staff,
      ban_staff,
      user,
      account,
      customer,
      transaction,
      ban,
      rate,
      credit,
      role
  }
})

export default store;
