<?php

namespace App\Services\CoreServicesApi;

class BranchesApi extends CoreServicesClient
{
    const ENDPOINT = '/api/branches';

    public function index()
    {
        $payload = $this->call('GET', self::ENDPOINT);

        return $payload->data ?? [];
    }

    public function create(array $data)
    {
        $options = [
            'json' => [
                'agent_id'    => $data['agent_id'],
                'branch_ref'  => $data['branch_ref'],
                'branch_name' => $data['branch_name'],
                'telephone'   => $data['telephone'],
                'website'     => $data['website'],
                'email'       => $data['email'],
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
                'agent_id'    => $data['agent_id'],
                'branch_ref'  => $data['branch_ref'],
                'branch_name' => $data['branch_name'],
                'telephone'   => $data['telephone'],
                'website'     => $data['website'],
                'email'       => $data['email'],
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
