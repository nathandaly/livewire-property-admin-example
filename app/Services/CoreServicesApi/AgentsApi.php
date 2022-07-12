<?php

namespace App\Services\CoreServicesApi;

class AgentsApi extends CoreServicesClient
{
    const ENDPOINT = '/api/agents';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $options = [
            'json' => [
                'company_name' => $data['company_name'],
                'website'      => $data['website'],
                'description'  => $data['description'],
            ],
        ];

        $payload = $this->call('POST', self::ENDPOINT, $options);

        return $payload->data ?? [];
    }

    public function retrieve(int $id)
    {
        $payload = $this->call('GET', sprintf('%s/%d', self::ENDPOINT, $id));

        return $payload->data ?? [];
    }

    public function update(int $id, array $data)
    {
        $options = [
            'json' => [
                'company_name' => $data['company_name'],
                'website'      => $data['website'],
                'description'  => $data['description'],
            ],
        ];

        $payload = $this->call('PUT', sprintf('%s/%d', self::ENDPOINT, $id), $options);

        return $payload->data ?? [];
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
