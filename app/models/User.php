<?php
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
class User extends SentryUserModel
{
	public function tujabs()
	{
		return $this->belongsToMany('Tujab')->withPivot('validation')->withTimestamps();
	}
}