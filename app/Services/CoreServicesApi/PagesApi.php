<?php

namespace App\Services\CoreServicesApi;

class PagesApi extends CoreServicesClient
{
    const ENDPOINT = '/api/pages';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $options = [
            'json' => [
                'page_title'            => $data['page_title'],
                'slug'                  => $data['slug'],
                'page_content'          => $data['page_content'],
                'meta_page_title'       => $data['meta_page_title'] ?? '',
                'meta_page_description' => $data['meta_page_description'] ?? '',
                'show_on_sitemap'       => $data['show_on_sitemap'] ?? 0,
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
                'page_title'            => $data['page_title'],
                'slug'                  => $data['slug'],
                'page_content'          => $data['page_content'],
                'meta_page_title'       => $data['meta_page_title'] ?? '',
                'meta_page_description' => $data['meta_page_description'] ?? '',
                'show_on_sitemap'       => $data['show_on_sitemap'] ?? 0,
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
