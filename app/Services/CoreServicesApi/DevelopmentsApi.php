<?php

namespace App\Services\CoreServicesApi;

class DevelopmentsApi extends CoreServicesClient
{
    const ENDPOINT = '/api/developments';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $payload = $this->call('POST', self::ENDPOINT, $this->buildJsonPayload($data));

        return $payload->data ?? [];
    }

    public function retrieve(int $id)
    {
        $payload = $this->call('GET', sprintf('%s/%d', self::ENDPOINT, $id));

        return $payload->data ?? [];
    }

    public function update(int $id, array $data)
    {
        $payload = $this->call('PUT', sprintf('%s/%d', self::ENDPOINT, $id), $this->buildJsonPayload($data));

        return $payload->data ?? [];
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param  array  $data
     * @return array[]
     */
    private function buildJsonPayload(array $data): array
    {
        $options = [
            'json' => [
                'developer_id'        => $data['developer_id'],
                'developer_region_id' => $data['developer_region_id'],
                'development_name'    => $data['development_name'],
                'development_code'    => $data['development_code'],
                'price_min'           => $data['price_min'],
                'price_max'           => $data['price_max'],
                'telephone'           => $data['telephone'],
                'email'               => $data['email'],
                'opening_hours'       => $data['opening_hours'],
                'description'         => $data['description'],
            ],
        ];

        return $options;
    }
}
