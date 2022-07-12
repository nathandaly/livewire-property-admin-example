<?php

namespace App\Services\CoreServicesApi;

class DeveloperRegionsApi extends CoreServicesClient
{
    const ENDPOINT = '/api/developer-regions';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $options = [
            'json' => [
                'developer_id' => $data['developer_id'],
                'region_name'  => $data['region_name'],
                'area_id'      => $data['area_id'],
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
                'developer_id' => $data['developer_id'],
                'region_name'  => $data['region_name'],
                'area_id'      => $data['area_id'],
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
