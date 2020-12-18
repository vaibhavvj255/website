<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function sendEmail()
	{  
		$this->load->database();

	     // Fething the data from the form
		 $name = $this->input->post('name'); 
         $email = $this->input->post('email');
         $subject = $this->input->post('subject'); 
         $message = $this->input->post('message');
         date_default_timezone_set("America/Toronto");
         $date =  date("Y-m-d H:i:s");

         //Sending the email

         $to = 'vaibhavvj255@gmail.com';
         $message_of_email = "From: ".$name." Email: ".$email." Message: ".$message;

        if( mail($to, $subject, $message_of_email)){
        	$mailSend = 'yes';
        }
        else {
        	$mailSend = 'no';
        }

         // Storing in the database 
         $data = array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'date' => $date,
        'mail_sent' => $mailSend
    );
         $this->db->insert('contact_info', $data);
         $msg = 'Thank you '.$name.' for your message. I will get back to you soon.';
         echo "<script type='text/javascript'>alert('$msg'); window.location = 'http://fabiovj.info';</script>";
         
	}

}



















