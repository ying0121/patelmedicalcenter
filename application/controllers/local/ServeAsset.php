<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class ServeAsset extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model');
        $this->load->model('Vault_model');
    }

    public function getFile()
    {
        $filename = $_GET['filename'];
        $category = $_GET['category'];
        // Define the path to the assets directory
        $assetsDirectory = 'assets/' . $category . '/';

        // Construct the full path to the requested file
        $filePath = $assetsDirectory . $filename;

        // Check if the file exists and is readable
        if (file_exists($filePath) && is_readable($filePath)) {
            // Set appropriate headers
            header('Content-Description: File Transfer');
            header('Content-Type: ' . mime_content_type($filePath));
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Clear output buffer
            ob_clean();
            flush();

            // Output the file content
            readfile($filePath);
            exit;
        } else {
            // If the file does not exist or is not readable, return a 404 error
            show_404();
        }
    }

    public function getVaultDocumentNames()
    {
        $result = $this->Vault_model->readOnlyNames();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
}
