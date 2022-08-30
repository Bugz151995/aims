<?php

namespace App\Controllers;

use \App\Models\AccountModel;

class Account extends BaseController
{
  protected $helpers = ['form'];

  public function login()
  {
    $validation = \Config\Services::validation();

    if (!$this->validate($validation->getRuleGroup('login')))
      return view('login', ['validation' => $this->validator]);

    return redirect()->to('/dashboard');
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }

  public function save()
  {
    $validation = \Config\Services::validation();
    $account = model(AccountModel::class);
    $user = model(UserModel::class);

    $account_req = $this->request->getPost('account_id');
    $user_req = $this->request->getPost('user_id');

    $user_data = [
      'fname' => $this->request->getPost('fname'),
      'mname' => $this->request->getPost('mname'),
      'lname' => $this->request->getPost('lname'),
      'year_graduated' => $this->request->getPost('year_graduated'),
    ];

    $account_data = ['username' => $this->request->getPost('username')];

    $account_rule = $validation->getRuleGroup('new_account');

    if (isset($account_req) && isset($user_req)) {
      $account_rule = $validation->getRuleGroup('edit_account');
      $user_data = array_merge($user_data, ['user_id' => $user_req]);
      $account_data = array_merge($account_data, ['account_id' => $account_req]);
    }
    
    if ($this->validate($account_rule)) {
      $user->save($user_data);

      if (!isset($account_req) && !isset($user_req)) 
        $account_data = array_merge($account_data, ['user_id' => $user->getInsertID(), 'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)]);

      $account->save($account_data);

      return redirect()->to('/users');
    }

    return redirect()->back()->with('validation', $this->validator);
  }

  public function delete()
  {
    $account = model(AccountModel::class);
    $user = model(UserModel::class);

    $account_id = ['account_id' => $this->request->getPost('account_id')];
    $user_id = ['user_id' => $this->request->getPost('user_id')];

    $account->delete($account_id);
    $user->delete($user_id);
    
    return redirect()->to('/users');
  }
}
