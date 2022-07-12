<?php

namespace App\Services\CoreServicesApi;

use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

abstract class CoreServicesClient
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri'    => config('services.core_services_api.domain'),
            'timeout'     => 3,
            'http_errors' => false,
            'verify'      => (config('env') == 'production'),
        ]);
    }

    protected function call(string $method, string $endpoint, array $options = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, $options);
        } catch (\Exception $ex) {
            Log::error('Client Error', [
                'error_code'    => $ex->getCode(),
                'error_message' => $ex->getMessage(),
            ]);

            abort($ex->getCode());
        }

        $statusCode = $response->getStatusCode();
        if ($statusCode == Response::HTTP_NOT_FOUND) {
            abort(404);
        } elseif (! in_array($statusCode, [Response::HTTP_OK, Response::HTTP_CREATED])) {
            Log::error('API Error', [
                'response_code' => $statusCode,
                'response_body' => $response->getBody(),
            ]);

            return [];
        }

        return json_decode((string) $response->getBody());
    }

    abstract public function index();

    abstract public function create(array $data);

    abstract public function retrieve(int $id);

    abstract public function update(int $id, array $data);

    abstract public function delete(int $id);
}
