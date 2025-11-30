<?php
/**
 * Requires the "PHP Email Form" library
 * Make sure the library is uploaded to: vendor/php-email-form/php-email-form.php
 */

$receiving_email_address = 'hlala6462@gmail.com'; // بريدك الشخصي

// التأكد من وجود المكتبة
if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
} else {
    die( 'Unable to load the "PHP Email Form" Library!' );
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// إعدادات البريد
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// إذا تحب تستخدم SMTP بدل mail() (اختياري)
// $contact->smtp = array(
//   'host' => 'smtp.gmail.com',
//   'username' => 'your_gmail_username@gmail.com',
//   'password' => 'your_gmail_app_password', // استخدم App Password مع Gmail
//   'port' => '587'
// );

// الرسائل المرسلة
$contact->add_message( $_POST['name'], 'From');
$contact->add_message( $_POST['email'], 'Email');
isset($_POST['phone']) && $contact->add_message($_POST['phone'], 'Phone');
$contact->add_message( $_POST['message'], 'Message', 10);

// إرسال الرسالة
echo $contact->send();
?>
