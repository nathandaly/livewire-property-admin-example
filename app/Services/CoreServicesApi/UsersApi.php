<?php

namespace App\Services\CoreServicesApi;

use Illuminate\Support\Facades\Hash;

class UsersApi extends CoreServicesClient
{
    const ENDPOINT = '/api/users';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $options = [
            'json' => [
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
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
                'name'     => $data['name'],
                'email'    => $data['email'],
            ],
        ];

        $payload = $this->call('PUT', sprintf('%s/%d', self::ENDPOINT, $id), $options);

        return $payload->data ?? [];
    }

    public function delete(int $id)
    {
        // TODO: Delete User
    }
}
