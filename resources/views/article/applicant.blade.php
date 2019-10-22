
<h3>Detailled informations</h3>
<ul>
	<li>Appelation: {{$applicant->appelation}}</li>
	<li>firstname: {{$applicant->firstname}}</li>
	<li>lastname: {{$applicant->lastname}}</li>
	<li>dateApplicationStarted: {{$applicant->dateApplicationStarted}}</li>
	<li>dateApplicationCompleted: {{$applicant->dateApplicationCompleted}}</li>
	<li>email: {{$applicant->email}}</li>
	<li>skypeId: {{$applicant->skypeId}}</li>
	<li>gender: {{$applicant->gender}}</li>
	<li>dob: {{$applicant->dob}}</li>
	<li>grade: {{$applicant->school}}</li>
	<li>identityDocument: {{$applicant->identityDocument}}</li>
	<li>address: {{$applicant->address}}</li>
	<li>cityResidence: {{$applicant->cityResidence}}</li>
	<li>countryResidence: {{$applicant->countryResidence}}</li>
	<li>nationality: {{$applicant->nationality}}</li>
	<li>linkedInURL: {{$applicant->linkedInURL}}</li>
	<li>giHubURL: {{$applicant->giHubURL}}</li>
	<li>professionalStatus: {{$applicant->professionalStatus}}</li>
	<li>maritalStatus: {{$applicant->maritalStatus}}</li>
	<li>preferredCountryPostProgram: {{$applicant->preferredCountryPostProgram}}</li>
	<li>motivationLetter: {{$applicant->motivationLetter}}</li>
	<li>scope1: {{$applicant->scope1}}</li>
	<li>scope2: {{$applicant->scope2}}</li>
</ul>
<form method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$applicant->id}}">
	<input type="submit" name="delete" value="Delete">
</form>



