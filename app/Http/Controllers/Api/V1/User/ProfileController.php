<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Http\Controllers\ApiController;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Transformers\User\UserTransformer;
use Illuminate\Http\Request;
use App\Http\Requests\User\UploadDocumentRequest;

/**
 * @group Profile-Management
 *
 * APIs for Profile-Management
 */
class ProfileController extends ApiController
{
    /**
     * ImageUploader instance.
     *
     * @var ImageUploaderContract
     */
    protected $imageUploader;

    /**
     * ProfileController constructor.
     *
     * @param ImageUploaderContract $imageUploader
     */
    public function __construct(ImageUploaderContract $imageUploader)
    {
        $this->imageUploader = $imageUploader;
    }

    /**
     * Update user profile.
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @response
     * {
     *"success": true,
     *"message": "success"
     *}
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = $request->only(['name', 'email', 'last_name','mobile','gender_based_search']);

        if ($uploadedFile = $this->getValidatedUpload('profile_picture', $request)) {
            $data['profile_picture'] = $this->imageUploader->file($uploadedFile)
                ->saveProfilePicture();
        }

        $user = $request->user();
        $user->update($data);
        $user = fractal($user->fresh(), new UserTransformer);

        return $this->respondSuccess($user);
    }

    public function uploadDocument(UploadDocumentRequest $request)
    {

        $createdParam['document_id'] = $request->document_id;
        // $createdParam['user_id'] = auth()->user()->id ;
        $createdParam['extra_fields'] = \json_encode($request->except(['document_id','image'])) ;
        $createdParam['image'] = $request->document_id;
        $createdParam['document_status'] = 1;

        auth()->user()->document()->create($createdParam);
        
        echo "<pre>";
        print_r( $createdParam );

        die();

        // $createdParam = 

        dd( auth()->user()->document()->insert() );

        dd( auth()->user()->id );
        echo "<pre>";
        print_r( $request->all() );

        die();
    }
        


    /**
     * get user profile.
     *
     * 
     * @return \Illuminate\Http\JsonResponse
     * @response
     * {
     *   "success": true,
     *   "message": "success"
     *}
     */
    public function viewProfile(Request $request)
    {
    
        $user = $request->user();

        $user = fractal($user->fresh(), new UserTransformer);

        return $this->respondSuccess($user,'user_profile');
    }
    
    /**
     * Update user password.
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @response
     * {
     *"success": true,
     *"message": "success"
     *}
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        $oldPassword = $request->input('old_password');
        $password = $request->input('password');

        $user = $request->user();

        if (!hash_check($oldPassword, $user->password)) {
            $this->throwCustomValidationException('Invalid old password entered.', 'old_password');
        }

        $user->forceFill(['password' => bcrypt($password)])->save();

        return $this->respondSuccess();
    }
}
