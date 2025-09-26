<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class InvoiceMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */

    public function welcome($invoice) {       

        $this
        ->setFrom(['wattarapublishers@gmail.com' => 'Wattara Publishers LTD'])  
        ->SetTo('ogunsakinoluwatoba@gmail.com') 
        ->setEmailFormat('html')
        ->setTransport('gmail')
        ->setViewVars(['invoice' => $invoice])
        ->setSubject(sprintf('Invoice %s', $invoice->id))
        ->viewBuilder()
            ->setTemplate('invoice')
            ->setLayout('default'); 
        /*    
        debug($invoice);*/
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