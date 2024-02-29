<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiClient
{

    protected $base_urls = array();

    public function __construct()
    {
        // Isi base URLs sesuai kebutuhan
        $this->base_urls['api1'] = 'https://api.example1.com/';
        $this->base_urls['api2'] = 'https://api.example2.com/';
    }

    public function getRequest($endpoint, $params = [], $base_url = 'api1')
    {
        $this->setAuthorizationHeader();

        // Lakukan permintaan GET ke API menggunakan base URL yang sesuai
        $this->callApi('GET', $endpoint, $params, $this->base_urls[$base_url]);
    }

    public function postRequest($endpoint, $data = [], $base_url = 'api1')
    {
        $this->setAuthorizationHeader();

        // Lakukan permintaan POST ke API menggunakan base URL yang sesuai
        $this->callApi('POST', $endpoint, $data, $this->base_urls[$base_url]);
    }

    // Metode untuk mengatur header 'Authorization' dengan token Bearer
    protected function setAuthorizationHeader()
    {
        $CI = &get_instance();
        $CI->curl->http_header('Authorization', 'Bearer ' . $this->access_token);
    }

    // Metode untuk melakukan permintaan ke API
    protected function callApi($method, $endpoint, $params, $base_url)
    {
        // Lakukan permintaan ke API menggunakan $method, $endpoint, $params, dan $base_url
    }
}
