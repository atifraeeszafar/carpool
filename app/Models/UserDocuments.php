<?php

namespace App\Models;

use App\Models\Access\Role;
use App\Models\Admin\Staff;
use App\Models\Admin\Driver;
use App\Models\Common\RideModel;
use App\Models\Traits\HasActive;
use App\Models\Admin\AdminDetail;
use App\Models\Admin\UserDetails;
use Laravel\Passport\HasApiTokens;
use App\Models\LinkedSocialAccount;
use App\Models\Admin\LocationDetail;
use App\Base\Services\OTP\CanSendOTP;
use App\Models\Rider\RiderPreference;
use App\Models\Traits\DeleteOldFiles;
use App\Models\Traits\UserAccessTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Models\Requests\OfferedRidePlace;
use App\Models\Traits\UserAccessScopeTrait;
use App\Base\Services\OTP\CanSendOTPContract;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Master\Car;
use App\Base\Uuid\UuidModel;

class UserDocuments extends Authenticatable implements CanSendOTPContract
{
    use CanSendOTP,
    DeleteOldFiles,
    // UuidModel,
    HasActive,
    HasApiTokens,
    Notifiable,
    UserAccessScopeTrait,
        UserAccessTrait,SearchableTrait;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','document_id','image','extra_fields','document_status'
    ];

    protected $searchable = [
       

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that have files that should be auto deleted on updating or deleting.
     *
     * @var array
     */
    public $deletableFiles = [
        'image',
    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
    ];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
    ];

    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */
    protected $appends = [
        'image'
    ];

    /**
    * Get the Profile image full file path.
    *
    * @param string $value
    * @return string
    */
    public function getImageAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $value));
    }

    /**
     * Override the "boot" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        // Model event handlers
    }

    /**
     * Set the password using bcrypt hash if stored as plaintext.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (password_get_info($value)['algo'] === 0) ? bcrypt($value) : $value;
    }

    /**
     * The roles associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

        /**
     * The default file upload path.
     *
     * @return string|null
     */
    public function uploadPath()
    {
        return config('Base.user.upload.profile-picture.path');
    }

}
