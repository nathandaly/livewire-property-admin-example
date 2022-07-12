<?php

namespace App\Services\CoreServicesApi;

class AreasApi extends CoreServicesClient
{
    const ENDPOINT = '/api/areas';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $options = [
            'json' => [
                'slug'         => $data['slug'],
                'area_name'    => $data['area_name'],
                'ons_code'     => $data['ons_code'],
                'page_content' => $data['page_content'],
                'page_order'   => $data['page_order'],
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
                'slug'         => $data['slug'],
                'area_name'    => $data['area_name'],
                'ons_code'     => $data['ons_code'],
                'page_content' => $data['page_content'],
                'page_order'   => $data['page_order'],
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
