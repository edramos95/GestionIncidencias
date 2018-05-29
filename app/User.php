<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarPathAttribute()
    {
        if($this->is_client)
            return '/images/client.png';

        return '/images/support.png';
    }

    //Relationships
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function computers()
    {
        return $this->hasMany('App\UserComputer');
    }

    public function canTake(Incident $incident)
    {
        return ProjectUser::where('user_id', $this->id)->where('level_id', $incident->level_id)->first();
    }

    public function getListOfProjectsAttribute($value='')
    {
        if($this->role == 1)
            return $this->projects;
        return Project::all();
    }

    public function getIsAdminAttribute()
    {
        return $this->role == 0;
    }

    public function getIsClientAttribute()
    {
        return $this->role == 2;
    }

    public function getIsSupportAttribute()
    {
        return $this->role == 1;
    }
}
