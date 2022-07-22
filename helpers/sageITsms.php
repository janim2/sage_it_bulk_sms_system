<?php
class sendMessage
{
    private $_endpoint;
    public $keey;
    public $email;
    public $senderID;
    public $phoneNumber;
    public $message;

    public function __construct()
    {
        $this->_endpoint = 'http://localhost/sms/api/sms/send_SMS.php';
    }

    public function sendTheMessage()
    {
        $endPoint = 'http://localhost/sms/api/sms/send_SMS.php';

        $url = $endPoint;

        $data = [
            'email'         => $this->email,
            'api_key'       => $this->keey,
            'senderID'      => $this->senderID,
            'phoneNumber'   => $this->phoneNumber,
            'message'       => $this->message
        ];

        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        // echo $result;
        return $result = json_decode($result, TRUE);
        curl_close($ch);
    }
}
?>