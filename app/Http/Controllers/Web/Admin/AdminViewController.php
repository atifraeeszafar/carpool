<?php

namespace App\Http\Controllers\Web\Admin;

use Socialite;
use App\SocialAccountService;
use App\Http\Controllers\Web\BaseController;
use thiagoalessio\TesseractOCR\TesseractOCR;

class AdminViewController extends BaseController
{

    public function testImg(){


       // $image ='https://user-images.githubusercontent.com/7629427/33532834-fa434742-d894-11e7-8cce-65afb26a8af0.png';
        //$image="https://trak.in/wp-content/uploads/2019/10/Untitled-design-8-1-1280x720.jpg";

        $image="https://www.am22tech.com/wp-content/uploads/2020/03/visa-holder-driving-license-renewal-in-usa-coronavirus.jpg";
        $imageTempName = tempnam(sys_get_temp_dir(), 'image-from-remote-url');
        file_put_contents($imageTempName, file_get_contents($image));

       
        $ocr = new TesseractOCR($imageTempName);
        $ocr->psm(4);
        echo $ocr->run(), PHP_EOL;

   }

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
