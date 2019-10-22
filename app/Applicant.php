<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [ 
							'appelation',
							'firstname',
							'lastname',
							'preferredname',
							'programId',
							'applicationStatus',
							'dateApplicationStarted',
							'dateApplicationCompleted',
							'primaryLanguage',
							'email',
							'skypeId',
							'gender',
							'dob',
							'school',
							'identityDocument',
							'address',
							'cityResidence',
							'countryResidence',
							'nationality',
							'linkedInURL',
							'giHubURL',
							'professionalStatus',
							'maritalStatus',
							'preferredCountryPostProgram',
							'motivationLetter',
							'scope1',
							'scope2',
					    ];

    protected $guarded=['id', 'created_at']; 
}
