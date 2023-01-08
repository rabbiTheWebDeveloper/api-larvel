<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 'admin';
    const MERCHANT = 'merchant';
    const CUSTOMER = 'customer';
    const STAFF = 'staff';

    const STATUS_BLOCKED = 'blocked';
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avatar'];


    public static function listStatus(): array
    {
        return [
            self::STATUS_ACTIVE => 'active',
            self::STATUS_BLOCKED => 'blocked',
            self::STATUS_INACTIVE  => 'inactive',
        ];

    }


    /**
     * return password as a hash
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param $value
     * @return string
     */
    public function getAvatarAttribute($value): string
    {
        return $value ?: asset('images/profile.png');

    }

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    /**
     * Return The shop that belongs to this User
     *
     */
    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

    public function merchantinfo(): HasOne
    {
        return $this->hasOne(MerchantInfo::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function support_ticket(): HasMany
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function customer_info(): HasOne
    {
        return $this->hasOne(CustomerInfo::class);
    }

    public function createApiToken(): string
    {
        $token = Str::random(64);
        $this->api_token = $token;
        $this->save();
        return $token;
    }

    public function removeApiToken(): string
    {
        $this->api_token=null;
        $this->save();
        return 'Successfully logged out';
    }
}
