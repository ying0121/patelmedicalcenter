<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Letters_model');
        $this->load->model('Service_model');
        $this->load->model('Contactemail_model');
    }

    public function index()
    {
        $this->load->view('payment', []);
    }

    private function calculateOrderAmount(array $items): int
    {
        // Calculate the order total on the server to prevent
        // people from directly manipulating the amount on the client
        $total = 0;
        foreach ($items as $item) {
            $total += $item->amount;
        }
        return $total;
    }

    public function createPaymentIntent()
    {
        require_once APPPATH . 'libraries/stripe-php/init.php'; // Adjust the path as necessary

        // retrieve JSON from POST body
        $jsonStr = file_get_contents('php://input');
        $jsonObj = json_decode($jsonStr);

        try {
            $stripe = new \Stripe\StripeClient($this->config->item("stripe_secret"));
        } catch (Exception $e) {
            error_log(json_encode($e));
        }
        header('Content-Type: application/json');

        try {
            // Create a PaymentIntent with amount and currency
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => $this->calculateOrderAmount($jsonObj->items),
                'currency' => 'usd',
                // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function paymentResult()
    {
        $data["category"] = $_POST["category"];
        $data["category_id"] = $_POST["category_id"];
        $data["payment_id"] = $_POST["payment_id"];
        $data["amount"] = $_POST["amount"];
        $data["currency"] = $_POST["currency"];
        $data["payment_method"] = $_POST["payment_method"];
        $data["status"] = $_POST["status"];

        // Get Another Informations
        require_once APPPATH . 'libraries/stripe-php/init.php'; // Adjust the path as necessary

        \Stripe\Stripe::setApiKey($this->config->item("stripe_secret"));
        $paymentIntent = \Stripe\PaymentIntent::retrieve($data["payment_id"]);

        $paymentMethodId = $paymentIntent->payment_method;
        $paymentMethod = \Stripe\PaymentMethod::retrieve($paymentMethodId);

        $data["card_number"] = $paymentMethod->card->last4;
        $data["brand"] = $paymentMethod->card->brand;

        $expMonth = $paymentMethod->card->exp_month;
        $expYear = $paymentMethod->card->exp_year;
        $data["expired_date"] = str_pad($expMonth, 2, "0", STR_PAD_LEFT) . "/" . $expYear;

        $data["name"] = $paymentMethod->billing_details->name ?? null;
        $data["email"] = $paymentMethod->billing_details->email ?? null;
        $data["phone"] = $paymentMethod->billing_details->phone ?? null;
        $data["country"] = $paymentMethod->billing_details->address->country ?? null;

        // Insert to database for transaction
        $res = $this->Payment_model->insert($data);

        // get category (like service, letter) data
        $category_data = $data["category"] == "letter" ? $this->Letters_model->chosenLetters($data["category_id"]) : $this->Service_model->chosenClinicService($data["category_id"]);
        $data["category_title"] = $category_data["title"];

        // Create and Send an Invoice Begin //
        $customerId = $paymentIntent->customer;
        if (!$customerId) {
            // Create New Customer
            $customer = \Stripe\Customer::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "phone" => $data["phone"],
                "address" => [
                    "country" => $data["country"],
                ],
                "description" => "Invoice for ".$data["category"]." - ".$data["category_title"],
            ]);
            $customerId = $customer->id;
        }
        // Create an Invoice Item with the Price, and Customer you want to charge
        $invoiceItem = \Stripe\InvoiceItem::create([
            'customer' => $customerId,
            "amount" => $data["amount"] * 100,
            "currency" => $data["currency"],
            "description" => 'Invoice for ' . $data["category"]
        ]);
        // Create an Invoice
        $invoice = \Stripe\Invoice::create([
            'customer' => $customerId,
            'collection_method' => 'send_invoice',
            'days_until_due' => 3
        ]);
        // Send the Invoice
        $invoice->sendInvoice();
        // Create and Send an Invoice End //

        // send an email
        $this->load->library('email');
        $this->email->set_newline("rn");

        $config = array();
        $config['protocol']    = 'mail';
        $config['smtp_timeout'] = '7';
        $config['auth'] = true;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bo
        $this->email->initialize($config);
        $this->email->from($this->config->item('smtp_user'));

        // get email list from contact_email table
        $emails = $this->Contactemail_model->getEmailListForPayment();

        $this->email->to($emails);

        $mail_body = array(
            'card_number' => $data['card_number'],
            'brand' => $data['brand'],
            'amount' => $data["amount"],
            'currency' => $data['currency'],
            'payment_id' => $data['payment_id'],
            'status' => $data['status'],
            'status_color' => $data["status"] == "succeeded" ? "#5cb85c" : "#d9534f",
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'category' => $data['category'] == "service" ? "Service" : "Letter",
            'date' => date('m/d/Y'),
            'category_title' => $category_data["title"]
        );
        $html = $this->load->view('email/paymentemail.php', $mail_body, TRUE);
        $this->email->subject('Payment Email');
        $this->email->message($html);
        $this->email->send();

        echo json_encode($res);
    }
}
