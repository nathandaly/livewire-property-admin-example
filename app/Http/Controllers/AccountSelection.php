<?php

namespace App\Http\Controllers;

use App\Models\Eloquent\BusinessUserAccount;
use Illuminate\Http\Request;

class AccountSelection extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $accounts = $user->businessUserAccounts;

        if ($accounts->count() == 1) {
            // TODO: User only has one account, automatic forward.
            /** @var BusinessUserAccount $account */
            $account = $accounts->first();

            switch ($account->account_type) {
                case 'developer':
                    return redirect()->route('developer.dashboard', [$account->account]);

                case 'development':
                    return redirect()->route('development.dashboard', [$account->account]);

                case 'agent':
                    return redirect()->route('agent.dashboard', [$account->account]);

                case 'branch':
                    return redirect()->route('branch.dashboard', [$account->account]);
            }
        }

        return view('accounts.select', compact('user', 'accounts'));
    }
}
