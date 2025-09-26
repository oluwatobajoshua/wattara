<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */

    public function welcome($user) {       

        $this
        ->from(['finance@sampresh.com' => 'Sampresh'])  
        ->to($user['userEmail']) 
        ->transport('gmail')
        ->subject(sprintf('Welcome %s', $user['userFullName']))
        ->template('welcome', 'default')
        ->emailFormat('html') 
        ->setViewVars($user); // By default template with same→name as method name is used. 

    }

    public function resetPassword($user) { 
        
        $this
        ->from(['finance@sampresh.com' => 'Sampresh'])  
        ->to($user['userEmail']) 
        ->transport('gmail')
        ->subject(sprintf('Password Reset'))
        ->template('password_reset', 'default')
        ->emailFormat('html') 
        ->setViewVars($user); // By default template with same→name as method name is used. 
    }

    public function activate($user) { 
        
        $this 
        ->to($user->email) 
        ->transport('gmail')
        ->subject(sprintf('Welcome %s', $user->username))
        ->template('welcome', 'default')
        ->emailFormat('html') 
        ->setViewVars($user); // By default template with same→name as method name is used. */

    }

}