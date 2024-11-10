<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getSingle($id){
        return User::find($id);
    }

    static public function getAdmin(){
        $return = User::select('users.*')
                           ->where('user_type', '=', 1)
                           ->where('is_delete', '=', 0);
                           if(!empty(Request::get('name')))
                           {
                            $return=$return->where('name' , 'like','%'.Request::get('name').'%');
                           }
                           if(!empty(Request::get('email')))
                           {
                            $return=$return->where('email' , 'like','%'.Request::get('email').'%');
                           }
        $return=$return->orderBy('id','desc')
                                        ->paginate(20);
        return $return;
    }    

    static public function getEmailSingle($email){
            return User::where('email' , '=' , $email)->first();

        }

}
