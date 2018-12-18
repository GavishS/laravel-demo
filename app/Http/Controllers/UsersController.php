<?php

namespace App\Http\Controllers;

use App\User; /* users table model */
use App\User_job_types; /* user_job_types table model */
use App\User_bank_details; /* user_bank_details table model */
use App\User_skills; /* user_bank_details table model */
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Carbon\Carbon;
use File;

class UsersController extends Controller {

    /**
     * Get a validator for an incoming user registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function index() {
        echo "1";
        die;
    }

    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function storeBusinessUser(Request $request) {
        $profile_photo = "";
        $bank_proof = "";
        $identity_proof = "";
        $path = public_path() . '/uploads';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        if (isset($_FILES["user_photo"]["type"])) {
            $profile_photo = time() . "-" . rand(1000, 9999) . basename($_FILES["user_photo"]["name"]);
            move_uploaded_file($_FILES['user_photo']['tmp_name'], public_path() . "/uploads/" . $profile_photo);
        }
        if (isset($_FILES["bank_proof"]["type"])) {
            $bank_proof = time() . "-" . rand(1000, 9999) . basename($_FILES["bank_proof"]["name"]);
            move_uploaded_file($_FILES['bank_proof']['tmp_name'], public_path() . "/uploads/" . $bank_proof);
        }
        if (isset($_FILES["identity_proof"]["type"])) {
            $identity_proof = time() . "-" . rand(1000, 9999) . basename($_FILES["identity_proof"]["name"]);
            move_uploaded_file($_FILES['identity_proof']['tmp_name'], public_path() . "/uploads/" . $identity_proof);
        }
        $firstname = request('firstname') ? request('firstname') : "";
        $lastname = request('lastname') ? request('lastname') : "";
        $username = request('username') ? request('username') : "";
        $email = request('email') ? request('email') : "";
        $password = request('password') ? request('password') : "";
        $phone = request('phone') ? request('phone') : "";
        $address = request('address') ? request('address') : "";
        $address2 = request('address2') ? request('address2') : "";
        $country = request('country') ? request('country') : "";
        $state = request('state') ? request('state') : "";
        $city = request('city') ? request('city') : "";
        $user_type = 1;
        $created_by = request('created_by') ? request('created_by') : 1;
        $modified_by = request('modified_by') ? request('modified_by') : 1;
        $register_token = bin2hex(random_bytes(40));


        $first_card_owner = "";
        $first_card_cvv = "";
        $first_card_number = "";
        $first_card_exp_month = "";
        $first_card_exp_year = "";

        $second_card_owner = "";
        $second_card_cvv = "";
        $second_card_number = "";
        $second_card_exp_month = "";
        $second_card_exp_year = "";

        if (!empty(request('first_card_owner')) && !empty(request('first_card_cvv')) && !empty(request('first_card_number')) && !empty(request('first_card_exp_month')) && !empty(request('first_card_exp_year'))) {
            if (request('first_card_owner') != "undefined" && request('first_card_cvv') != "undefined" && request('first_card_number') != "undefined" && request('first_card_exp_month') != "undefined" && request('first_card_exp_year') != "undefined") {
                $first_card_owner = request('first_card_owner') ? request('first_card_owner') : "";
                $first_card_cvv = request('first_card_cvv') ? request('first_card_cvv') : "";
                $first_card_number = request('first_card_number') ? request('first_card_number') : "";
                $first_card_exp_month = request('first_card_exp_month') ? request('first_card_exp_month') : "";
                $first_card_exp_year = request('first_card_exp_year') ? request('first_card_exp_year') : "";
            }
        }


        if (!empty(request('second_card_owner')) && !empty(request('second_card_cvv')) && !empty(request('second_card_number')) && !empty(request('second_card_exp_month')) && !empty(request('second_card_exp_year'))) {
            if (request('second_card_owner') != "undefined" && request('second_card_cvv') != "undefined" && request('second_card_number') != "undefined" && request('second_card_exp_month') != "undefined" && request('second_card_exp_year') != "undefined") {
                $second_card_owner = request('second_card_owner') ? request('second_card_owner') : "";
                $second_card_cvv = request('second_card_cvv') ? request('second_card_cvv') : "";
                $second_card_number = request('second_card_number') ? request('second_card_number') : "";
                $second_card_exp_month = request('second_card_exp_month') ? request('second_card_exp_month') : "";
                $second_card_exp_year = request('second_card_exp_year') ? request('second_card_exp_year') : "";
            }
        }

        try {
            $user = User::create([
                        'name' => $firstname,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'username' => $username,
                        'email' => $email,
                        'password' => bcrypt($password),
                        'phone' => $phone,
                        'address' => $address,
                        'address2' => $address2,
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                        'degree' => null,
                        'job_type' => null,
                        'user_type' => $user_type,
                        'created_by' => $created_by,
                        'modified_by' => $modified_by,
                        'register_token' => $register_token,
                        'photo' => $profile_photo
            ]);
            if (isset($user->id)) {


                User_bank_details::create([
                    'user_id' => $user->id,
                    'first_card_owner' => $first_card_owner,
                    'first_card_cvv' => $first_card_cvv,
                    'first_card_number' => $first_card_number,
                    'first_card_exp_month' => $first_card_exp_month,
                    'first_card_exp_year' => $first_card_exp_year,
                    'second_card_owner' => $second_card_owner,
                    'second_card_cvv' => $second_card_cvv,
                    'second_card_number' => $second_card_number,
                    'second_card_exp_month' => $second_card_exp_month,
                    'second_card_exp_year' => $second_card_exp_year,
                ]);

                $to = request('email');
                $register_token = $register_token;
                $site_url = URL::to("/");
                $email = request('email');
                $username = request('username');
                $name = request('firstname') . " " . request('lastname');

                $subject = 'Verify Registration!';

                $headers = "From: info@mployeemarketplace.com\r\n";
                $headers .= "Reply-To: info@mployeemarketplace.com\r\n";
                $headers .= "CC: susan@example.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $message = $this->verify_register_email_body($register_token, $site_url, $email, $username, $name);

                mail($to, $subject, $message, $headers);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            
        }
    }

    public function store(Request $request) {
        $profile_photo = "";
        $bank_proof = "";
        $identity_proof = "";
        $path = public_path() . '/uploads';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        if (isset($_FILES["user_photo"]["type"])) {
            $profile_photo = time() . "-" . rand(1000, 9999) . basename($_FILES["user_photo"]["name"]);
            move_uploaded_file($_FILES['user_photo']['tmp_name'], public_path() . "/uploads/" . $profile_photo);
        }
        if (isset($_FILES["bank_proof"]["type"])) {
            $bank_proof = time() . "-" . rand(1000, 9999) . basename($_FILES["bank_proof"]["name"]);
            move_uploaded_file($_FILES['bank_proof']['tmp_name'], public_path() . "/uploads/" . $bank_proof);
        }
        if (isset($_FILES["identity_proof"]["type"])) {
            $identity_proof = time() . "-" . rand(1000, 9999) . basename($_FILES["identity_proof"]["name"]);
            move_uploaded_file($_FILES['identity_proof']['tmp_name'], public_path() . "/uploads/" . $identity_proof);
        }
        $firstname = request('firstname') ? request('firstname') : "";
        $lastname = request('lastname') ? request('lastname') : "";
        $username = request('username') ? request('username') : "";
        $email = request('email') ? request('email') : "";
        $password = request('password') ? request('password') : "";
        $phone = request('phone') ? request('phone') : "";
        $address = request('address') ? request('address') : "";
        $address2 = request('address2') ? request('address2') : "";
        $country = request('country') ? request('country') : "";
        $state = request('state') ? request('state') : "";
        $city = request('city') ? request('city') : "";
        $degree = request('degree') ? request('degree') : "";
        $job_type = request('job_type') ? request('job_type') : "";
        $user_type = request('user_type') ? request('user_type') : "";
        $created_by = request('created_by') ? request('created_by') : 1;
        $modified_by = request('modified_by') ? request('modified_by') : 1;
        $register_token = bin2hex(random_bytes(40));

        $organizationname = request('organizationname') ? request('organizationname') : "";
        $organizationadd = request('organizationadd') ? request('organizationadd') : "";
        $organizationtime = request('organizationtime') ? request('organizationtime') : "";
        $availability = request('availability') ? request('availability') : "";

        $first_card_owner = "";
        $first_card_cvv = "";
        $first_card_number = "";
        $first_card_exp_month = "";
        $first_card_exp_year = "";

        $second_card_owner = "";
        $second_card_cvv = "";
        $second_card_number = "";
        $second_card_exp_month = "";
        $second_card_exp_year = "";

        if (!empty(request('first_card_owner')) && !empty(request('first_card_cvv')) && !empty(request('first_card_number')) && !empty(request('first_card_exp_month')) && !empty(request('first_card_exp_year'))) {
            if (request('first_card_owner') != "undefined" && request('first_card_cvv') != "undefined" && request('first_card_number') != "undefined" && request('first_card_exp_month') != "undefined" && request('first_card_exp_year') != "undefined") {
                $first_card_owner = request('first_card_owner') ? request('first_card_owner') : "";
                $first_card_cvv = request('first_card_cvv') ? request('first_card_cvv') : "";
                $first_card_number = request('first_card_number') ? request('first_card_number') : "";
                $first_card_exp_month = request('first_card_exp_month') ? request('first_card_exp_month') : "";
                $first_card_exp_year = request('first_card_exp_year') ? request('first_card_exp_year') : "";
            }
        }


        if (!empty(request('second_card_owner')) && !empty(request('second_card_cvv')) && !empty(request('second_card_number')) && !empty(request('second_card_exp_month')) && !empty(request('second_card_exp_year'))) {
            if (request('second_card_owner') != "undefined" && request('second_card_cvv') != "undefined" && request('second_card_number') != "undefined" && request('second_card_exp_month') != "undefined" && request('second_card_exp_year') != "undefined") {
                $second_card_owner = request('second_card_owner') ? request('second_card_owner') : "";
                $second_card_cvv = request('second_card_cvv') ? request('second_card_cvv') : "";
                $second_card_number = request('second_card_number') ? request('second_card_number') : "";
                $second_card_exp_month = request('second_card_exp_month') ? request('second_card_exp_month') : "";
                $second_card_exp_year = request('second_card_exp_year') ? request('second_card_exp_year') : "";
            }
        }

        $primary_skill = request('primary_skill') ? request('primary_skill') : "";
        $secondary_skill = request('secondary_skill') ? request('secondary_skill') : "";

        try {
            $user = User::create([
                        'name' => $firstname,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'username' => $username,
                        'email' => $email,
                        'password' => bcrypt($password),
                        'phone' => $phone,
                        'address' => $address,
                        'address2' => $address2,
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                        'degree' => $degree,
                        'job_type' => $job_type,
                        'user_type' => $user_type,
                        'register_token' => $register_token,
                        'created_by' => $created_by,
                        'modified_by' => $modified_by,
                        'photo' => $profile_photo
            ]);
            if (isset($user->id)) {

                if ($job_type == "PartTime") {

                    User_job_types::create([
                        'user_id' => $user->id,
                        'job_type' => $job_type,
                        'organization_name' => $organizationname,
                        'organization_address' => $organizationadd,
                        'time' => $organizationtime,
                        'availability' => $availability
                    ]);
                } else {

                    User_job_types::create([
                        'user_id' => $user->id,
                        'job_type' => $job_type,
                        'organization_name' => $organizationname,
                        'organization_address' => $organizationadd,
                        'time' => $organizationtime,
                        'availability' => $availability
                    ]);
                }

                User_bank_details::create([
                    'user_id' => $user->id,
                    'first_card_owner' => $first_card_owner,
                    'first_card_cvv' => $first_card_cvv,
                    'first_card_number' => $first_card_number,
                    'first_card_exp_month' => $first_card_exp_month,
                    'first_card_exp_year' => $first_card_exp_year,
                    'second_card_owner' => $second_card_owner,
                    'second_card_cvv' => $second_card_cvv,
                    'second_card_number' => $second_card_number,
                    'second_card_exp_month' => $second_card_exp_month,
                    'second_card_exp_year' => $second_card_exp_year,
                ]);

                User_skills::create([
                    'user_id' => $user->id,
                    'primary_skill' => $primary_skill,
                    'secondary_skill' => $secondary_skill
                ]);

                $to = request('email');
                $register_token = $register_token;
                $site_url = URL::to("/");
                $email = request('email');
                $username = request('username');
                $name = request('firstname') . " " . request('lastname');

                $subject = 'Verify Registration!';

                $headers = "From: info@mployeemarketplace.com\r\n";
                $headers .= "Reply-To: info@mployeemarketplace.com\r\n";
                $headers .= "CC: susan@example.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $message = $this->verify_register_email_body($register_token, $site_url, $email, $username, $name);

                mail($to, $subject, $message, $headers);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            
        }
    }

    public function check_unique_username_email(Request $request) {
        $check_email = User::where('email', '=', request("email"))->count();
        $check_username = User::where('username', '=', request("username"))->count();
        if ($check_email > 0)
            echo "1";
        else if ($check_username > 0)
            echo "2";
        else
            echo "0";
        die;
    }

    public function verify_user_registration_token(Request $request) {
        $get_user_with_token = User::where('register_token', '=', request("token"))->pluck('id')->first(); /* Get ID of user with token */
        if (!empty($get_user_with_token)) {

            $user = User::where('id', '=', $get_user_with_token)->first();
            $user->is_verified = '1';
            $user->register_token = NULL;

            echo $user->save();
            die;
        } else {
            echo "0";
            die;
        }
    }

    public function retrieve_password(Request $request) {
        $username_email = request('username_email');
        $status = 0;
        $retrieve_password_token = bin2hex(random_bytes(40));

        if (filter_var($username_email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where("email", "=", $username_email)->first();
            if (!empty($user)) {
                $user->retrieve_password_token = $retrieve_password_token;
                $user->retrieve_password_token_created_at = Carbon::now()->toDateTimeString();
                if ($user->save()) {

                    $to = $username_email;
                    $site_url = URL::to("/");
                    $subject = 'Retrieve Password!';

                    $headers = "From: info@mployeemarketplace.com\r\n";
                    $headers .= "Reply-To: info@mployeemarketplace.com\r\n";
                    $headers .= "CC: susan@example.com\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $message = $this->retrieve_password_email_body($retrieve_password_token, $site_url, $username_email);

                    if (mail($to, $subject, $message, $headers))
                        $status = 1;
                    else
                        $status = 0;
                } else {
                    $status = 0;
                }
            } else {
                $status = 0;
            }
        } else {
            $user = User::where("username", "=", $username_email)->first();

            if (!empty($user)) {
                $user->retrieve_password_token = $retrieve_password_token;
                $user->retrieve_password_token_created_at = Carbon::now()->toDateTimeString();
                $user_email = $user->email;
                if ($user->save()) {
                    $to = $user_email;
                    $site_url = URL::to("/");
                    $subject = 'Retrieve Password!';

                    $headers = "From: info@mployeemarketplace.com\r\n";
                    $headers .= "Reply-To: info@mployeemarketplace.com\r\n";
                    $headers .= "CC: susan@example.com\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $message = $this->retrieve_password_email_body($retrieve_password_token, $site_url, $username_email);

                    if (mail($to, $subject, $message, $headers))
                        $status = 1;
                    else
                        $status = 0;
                } else {
                    $status = 0;
                }
            } else {
                $status = 0;
            }
        }
        echo $status;
        die;
    }

    public function set_new_password(Request $request) {
        $token = request("retrieve_password_token");
        $new_password = request("password");
        $current_time = Carbon::now()->toDateTimeString();
        $status = 0;

        $user = User::where("retrieve_password_token", "=", $token)->first();
        if (!empty($user)) {
            $user->password = bcrypt($new_password);
            $user->retrieve_password_token = NULL;
            $user->retrieve_password_token_created_at = NULL;
            if ($user->save())
                $status = 1;
            else
                $status = 0;
        } else {
            $status = 0; /* Invalid Token */
        }
        echo $status;
        die;
    }

    public function retrieve_password_email_body($retrieve_password_token, $site_url, $username_email) {
        return "
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
            <meta content='width=device-width, initial-scale=1.0' name='viewport'>
                <title>Your Message Subject or Title</title>
                <style>
                    #outlook a {padding:0;} 
                    body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
                    .ExternalClass {width:100%;}
                    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
                    #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
                    img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
                    a img {border:none;}
                    .image_fix {display:block;}
                    p {margin: 1em 0;line-height: 18px;}
                    h1, h2, h3, h4, h5, h6 {color: black !important;}
                    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}
                    h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
                        color: red !important; 
                    }
                    h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
                        color: purple !important;
                    }
                    table td {border-collapse: collapse;}
                    table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
                    a {color: orange;}
                    a:link { color: orange; }
                    a:visited { color: blue; }
                    a:hover { color: green; }
                </style>
                </head>
                <body style='background: #f4f7f9; font-family:verdana, sans-serif;'>
                    <table align='center' bgcolor='#f4f7f9' border='0' cellpadding='0' cellspacing='0' id='backgroundTable' style='background: #f4f7f9;' width='100%'>
                        <tr>
                            <td align='center'>
                                <center>
                                    <table border='0' cellpadding='50' cellspacing='0' style='margin-left: auto;margin-right: auto;width:600px;text-align:center;' width='600'>
                                        <tr>
                                            <td align='center' valign='top'><h1 style='color: #00acec!important;font-size: 50px;'>GLOCALS</h1></td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td align='center'>
                                <center>
                                    <table border='0' cellpadding='30' cellspacing='0' style='margin-left: auto;margin-right: auto;width:600px;text-align:center;' width='600'>
                                        <tr>
                                            <td align='left' style='background: #ffffff; border: 1px solid #dce1e5;' valign='top' width=''>
                                                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                                    <tr>
                                                        <td align='center' valign='top'>
                                                            <h2 style='color: #00acec !important'>Password Reset</h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' style='border-top: 1px solid #dce1e5;border-bottom: 1px solid #dce1e5;' valign='top'>
                                                            <p style='margin: 1em 0;'>
                                                                <strong>Username/Email:</strong>
                                                                $username_email
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' valign='top'>
                                                            <p style='margin: 1em 0;'>
                                                                <br>   We have sent you this email in response to reset your password on <strong>Glocals</strong>. To reset your password for <strong>Glocals</strong>, please follow the link below.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' bgcolor='#00acec' valign='top'>
                                                            <h3><a href='$site_url#!/retrievepassword/$retrieve_password_token' style='color: #ffffff !important'>Change my password</a></h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' valign='top'>
                                                            <p style='margin: 1em 0;'>
                                                                <br>   We recommend that you keep your password secure and not share it with anyone. If you feel your password has been compromised, you can change it by going to your <strong>Glocals</strong> My Account Page and clicking on the 'Change Email Address or Password' link.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align='center' valign='top'>
                                                            <p style='margin: 1em 0;'>
                                                                <br>   If you need help, or have any other questions, feel free to email <a href='mailto:support@glocals.com'>support@glocals.com</a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>";
    }

    public function verify_register_email_body($register_token, $site_url, $email, $username, $name) {
        return "<!DOCTYPE html>

<html xmlns='http://www.w3.org/1999/xhtml'>

    <head>

        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>

        <meta content='width=device-width, initial-scale=1.0' name='viewport'>

        <title>Your Message Subject or Title</title>

        <style>

            /*<![CDATA[*/

            #outlook a {padding:0;} /* Force Outlook to provide a 'view in browser' menu link. */

            body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}

            .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */

            .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */

            #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}

            img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}

            a img {border:none;}

            .image_fix {display:block;}

            p {margin: 1em 0;}

            h1, h2, h3, h4, h5, h6 {color: black !important;}

            h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

            h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {

                color: red !important;

            }

            h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {

                color: purple !important;

            }

            table td {border-collapse: collapse;}

            table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

            a {color: orange;}

            a:link { color: orange; }

            a:visited { color: blue; }

            a:hover { color: green; }

            /*]]>*/

        </style>

    </head>

    <body style='background: #f4f7f9; font-family:Helvetica Neue, Helvetica, Arial;'>

        <table align='center' bgcolor='#f4f7f9' border='0' cellpadding='0' cellspacing='0' id='backgroundTable' style='background: #f4f7f9;' width='100%'>

            <tr>

                <td align='center'>

                    <center>

                        <table border='0' cellpadding='50' cellspacing='0' style='margin-left: auto;margin-right: auto;width:600px;text-align:center;' width='600'>

                            <tr>

                                <td align='center' valign='top'><h1 style='color: #00acec!important;font-size: 50px;'>GLOCALS</h1></td>

                            </tr>

                        </table>

                    </center>

                </td>

            </tr>

            <tr>

                <td align='center'>

                    <center>

                        <table border='0' cellpadding='30' cellspacing='0' style='margin-left: auto;margin-right: auto;width:600px;text-align:center;' width='600'>

                            <tr>

                                <td align='left' style='background: #ffffff; border: 1px solid #dce1e5;' valign='top' width=''>

                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>

                                        <tr>

                                            <td align='center' valign='top'>

                                                <h2>Thank you for joining us <strong>$name</strong> !</h2>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td align='center' valign='top'>

                                                <h4 style='color: #00acec !important'>Account confirmation</h4>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td align='center' style='border-top: 1px solid #dce1e5;border-bottom: 1px solid #dce1e5;' valign='top'>

                                                <p style='margin: 1em 0;'>

                                                    <strong>Username:</strong>$username

                                                </p>

                                                <p style='margin: 1em 0;'>

                                                    <strong>E-mail:</strong>

                                                    <a href='mailto:$email' style='color: #000000 !important;'>$email</a>

                                                </p>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td align='center' bgcolor='#00acec' valign='top'>

                                                <h3>

                                                    <a href='$site_url#!/verify_registration/$register_token' style='color: #ffffff !important'>Click here to confirm your account</a>

                                                </h3>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td align='center' valign='top'>

                                                <p style='margin: 1em 0;'><br></p>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                        </table>

                    </center>

                </td>

            </tr>

        </table>

    </body>

</html>";
    }

}