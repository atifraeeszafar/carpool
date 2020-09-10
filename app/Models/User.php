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

class User extends Authenticatable implements CanSendOTPContract
{
    use CanSendOTP,
    DeleteOldFiles,
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
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rating_average','no_of_rating','total_rating','name', 'username', 'email', 'password', 'mobile', 'country', 'profile_picture', 'email_confirmed', 'mobile_confirmed', 'email_confirmation_token', 'active','device_token','login_by'
    ];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [

            'name' => 10,
            'email' => 10,
            'mobile' => 8,
            'lastname' => 8,

        ],

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_confirmation_token',
    ];

    /**
     * The attributes that have files that should be auto deleted on updating or deleting.
     *
     * @var array
     */
    public $deletableFiles = [
        'profile_picture',
    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
        'id', 'name', 'username', 'email', 'mobile', 'profile_picture', 'last_login_at', 'created_at', 'updated_at',
    ];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'roles', 'otp', 'merchants', 'restaurantManagers',
    ];

    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */
    protected $appends = [
        'profile_picture'
    ];

    /**
    * Get the Profile image full file path.
    *
    * @param string $value
    * @return string
    */
    public function getProfilePictureAttribute($value)
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
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    /**
     * The OTP associated with the user's mobile number.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function otp()
    {
        return $this->hasOne(MobileOtp::class, 'mobile', 'mobile');
    }

    /**
     * Get the user model for the given username.
     *
     * @param string $username
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findForPassport($username)
    {
        return $this->where($this->usernameField($username), $username)->first();
    }

    /**
     * Get the username attribute based on the input value.
     * Result is either 'email' or 'mobile'.
     *
     * @param string $username
     * @return string
     */
    public function usernameField($username)
    {
        return is_valid_email($username) ? 'email' : 'mobile';
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

    /**
     * The Staff associated with the user's id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function admin()
    {
        return $this->hasOne(AdminDetail::class, 'user_id', 'id');
    }

    public function rideDetail()
    {
        return $this->hasMany(RideModel::class, 'rider_id', 'id');
    }
    public function riderPreferences()
    {
        return $this->hasMany(RiderPreference::class, 'rider_id', 'id');
    }

    public function offeredRidePlace()
    {
        return $this->hasMany(OfferedRidePlace::class, 'rider_id', 'id');
    }
    public function offeredRideCustomerRequest()
    {
        return $this->hasMany(OfferRideCustomerRequest::class, 'user_id', 'id');
    }

    /**
     * The Driver associated with the user's id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function driver()
    {
        return $this->hasOne(Driver::class, 'user_id', 'id');
    }

    public function accounts()
    {
        return $this->hasMany(LinkedSocialAccount::class, 'user_id', 'id');
    }
    public function locations()
    {
        return $this->hasMany(LocationDetail::class, 'poc_user_id', 'id');
    }

    /**
     * The Driver associated with the user's id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function userDetails()
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }

    /**
    * Specifies the user's FCM token
    *
    * @return string
    */
    public function routeNotificationForFcm()
    {
        return $this->device_token;
    }
    public function routeNotificationForApn()
    {
        return $this->apn_token;
    }

    public function car()
    {
        return $this->hasOne(Car::class, 'user_id', 'id');
    }
}
