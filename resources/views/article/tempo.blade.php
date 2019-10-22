
<h3>Vos informations renseignez</h3>
<ul>
	<li>Appelation: {{$tab['appelation']}}</li>
	<li>firstname: {{$tab['firstname']}}</li>
	<li>lastname: {{$tab['lastname']}}</li>
	<li>dateApplicationStarted: {{$tab['dateApplicationStarted']}}</li>
	<li>dateApplicationCompleted: {{$tab['dateApplicationCompleted']}}</li>
	<li>email: {{$tab['email']}}</li>
	<li>skypeId: {{$tab['skypeId']}}</li>
	<li>gender: {{$tab['gender']}}</li>
	<li>dob: {{$tab['dob']}}</li>
	<li>grade: {{$tab['school']}}</li>
	<li>identityDocument: {{$tab['identityDocument']}}</li>
	<li>address: {{$tab['address']}}</li>
	<li>cityResidence: {{$tab['cityResidence']}}</li>
	<li>countryResidence: {{$tab['countryResidence']}}</li>
	<li>nationality: {{$tab['nationality']}}</li>
	<li>linkedInURL: {{$tab['linkedInURL']}}</li>
	<li>giHubURL: {{$tab['giHubURL']}}</li>
	<li>professionalStatus: {{$tab['professionalStatus']}}</li>
	<li>maritalStatus: {{$tab['maritalStatus']}}</li>
	<li>preferredCountryPostProgram: {{$tab['preferredCountryPostProgram']}}</li>
	<li>motivationLetter: {{$tab['motivationLetter']}}</li>
	<li>scope1: {{$tab['scope1']}}</li>
	<li>scope2: {{$tab['scope2']}}</li>
</ul>
<form method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$id}}">
	<input type="submit" name="edit" value="Edit">
</form>
<form>
	{{ csrf_field() }}
	<input type="submit" name="save" value="Save">
</form>


