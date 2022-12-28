<?php

class ContactForm
{
    public $database;
    public $name;
    public $email;
    public $message;

    public function __construct($name = '', $email = '', $message = '')
    {
        $this->database = new Database();

        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Submit form
     */
    public function submit()
    {
        // Only change code below this line 
        $error = '';

        $name = $this->name;
        $email = $this->email;
        $message = $this->message;
        // instruction: check if all the fields are not empty

        if (!empty($email) || !empty($name) || !empty($message)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return [
                    'status' => 'error',
                    'message' => 'Invalid email format'
                ];
            }
        }

        // instruction: if all the fields are valid, insert the data into database

        if (!empty($email) && !empty($name) && !empty($message)) {
            $statement = $this->database->__construct()->prepare('INSERT INTO users (name, email, message) VALUES (:name, :email, :message)');
            $statement->execute([
                'name' => $name,
                'email' => $email,
                'message' => $message
            ]);

            return [
                'status' => 'success',
                'message' => 'Your message has successfully been sent.'
            ];

            header('Location:/index.php?status=success');
            exit;
        }

        // instruction: return status=success if the data is inserted into database


        return $error;
        // Only change code above this line
    }

    /**
     * [bonus point] Send message to admin email via SMTP API (postmark, mailgun, etc.)
     */
    public function sendMessage()
    {
        // Only change code below this line 

        // instruction: send email to admin email via SMTP API (postmark, mailgun, etc.)



        // instruction: return status=success if the email is sent


        // Only change code above this line
    }
}
