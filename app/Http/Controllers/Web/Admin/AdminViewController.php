<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Web\BaseController;
use Socialite;
use App\SocialAccountService;

class AdminViewController extends BaseController
{

    /**
     * Redirect to admin login
     */
    public function viewLogin()
    {
        if (auth()->user()) {
            return redirect('dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function dashboard()
    {

        // $this->validateAdmin();

        $page = trans('pages_names.dashboard');

        $main_menu = 'dashboard';

        $sub_menu = null;

        return view('admin.index', compact('page', 'main_menu', 'sub_menu'));
    }


    public function viewRequest()
    {

        // $this->validateAdmin();

        $page = trans('pages_names.request');

        $main_menu = 'request';

        $sub_menu = null;

        return view('admin.request.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function getAllRequest()
    {

        // $this->validateAdmin();

        return view('admin.request._request');
    }

    public function requestDetails()
    {

        // $this->validateAdmin();

        $page = trans('pages_names.request');

        $main_menu = 'request';

        $sub_menu = null;

        return view('admin.request.request_details', compact('page', 'main_menu', 'sub_menu'));
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback(SocialAccountService $accountService)
    {
        $user = Socialite::driver('facebook')->user();

        $provider = 'facebook';

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        $token = $authUser->createToken('access_token')->accessToken;

        return $this->respondSuccess($token);
    }
}
