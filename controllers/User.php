<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view("users/createuser");
    }

    function usersave() {
        $this->load->library('doctrine');
        $this->load->library('encryption');
        $em = $this->doctrine->em;
        $args = json_decode(file_get_contents("php://input"), true);
            $password = $args['password'];
            $password_confirmation = $args['password_confirmation'];
            if ($password == $password_confirmation) {
                $user = new Entity\User;
                $user->setName($args['name']);
                $user->setEmail($args['email']);
                $user->setPhone_no($args['phone_no']);
//                $hashed_password = crypt($args['password']);
                $user->setPassword($args['password']);
                $today = new DateTime();
                $user->setCreated_at($today);
                $user->setUpdated_at($today);
                $em->persist($user);
                $em->flush();
                echo json_encode(array(
                    'response_code' => '200',
                    'response_message' => 'inserted',
                    'user' => $user));
                exit;
            }
        }
    

    function userprofile() {
        $this->load->library('doctrine');
        $this->load->helper('url');
        $this->load->helper('form');
        $em = $this->doctrine->em;
        $args = json_decode(file_get_contents("php://input"), true);
        $userid = $args['user_id'];
        $user = $em->getRepository("Entity\User")->findOneBy(array('id' => $userid));

        echo json_encode(array(
            'response_code' => '200',
            'response_message' => 'data fetched',
            'user' => $user));
    }

    function updateuser() {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $args = json_decode(file_get_contents("php://input"), true);
        $userid = $args['id'];
        $user = $em->getRepository("Entity\User")->findOneBy(array('id' => $userid));
        $user->setName($args['name']);
        $user->setEmail($args['email']);
        $user->setPhone_no($args['phone_no']);
        $em->persist($user);
        $em->flush();
        echo json_encode(array(
            'response_code' => '200',
            'response_message' => 'Profile has been successfully updated',
            'user' => $user));
    }

    public function deleteuser() {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $args = json_decode(file_get_contents("php://input"), true);
        $userid = $args['id'];
        $user = $em->getRepository("Entity\User")->find(array('id' => $userid));
        $em->remove($user);
        $em->flush();
        echo json_encode(array(
            'response_code' => '200',
            'response_message' => 'user has been deleted successfully',
            'user' => $user));
    }

    public function sendemail($email, $name, $verifycode) {
        // To send HTML mail, the Content-type header must be set

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $this->load->library('email');
        $this->email->from('info@myallergyalert.com', 'My Allergy Alert');
        $this->email->to($email);
        $this->email->subject('My Allergy Alert Email Verification code');
        $message = '<html><body>';
        $message .= 'Hi <b>' . $name . '</b>,Please verify your email address so we know that its really you!.';
        $message .= ' <br>Enter this Verification code to Login into My Allergy Alert App.<br> ';
        $message .= '<h1>' . $verifycode . '</h1>';
        $message .= '</body></html>';

        $this->email->message($message);
        return $this->email->send();
    }

}
