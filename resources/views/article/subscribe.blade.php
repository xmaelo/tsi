<form method="post">
	{{ csrf_field() }}
	@if(!empty($edit)) 
	 	<input type="hidden" name="id" value="{{$edit->id}}">
	@else 
	@endif
	<div>	
		<label for="appelation">Appelation</label> 
		<select required name="appelation">
			<option value="Mrs" <?php  if (isset($edit)){ selected($edit, 'appelation', 'Mrs'); } ?> >Mrs</option>
			<option value="Sir" <?php  if (isset($edit)){ selected($edit, 'appelation', 'Sir'); } ?>>Sir</option>
		</select>
	</div>
	<div>
		<label for="firstname">Firstname</label>
		<input type="text" value="{{ !empty($edit) ? $edit->firstname : ''}}" required name="firstname">
	</div>
	<div>
		<label for="lastname">Lastname</label>
		<input type="text" value="{{ !empty($edit) ? $edit->lastname : ''}}" required name="lastname">
	</div>
	<div>
		<label for="dateApplicationStarted">Date Application started</label>
		<input type="date" value="{{ !empty($edit) ? $edit->dateApplicationStarted : ''}}" name="dateApplicationStarted">
	</div>
	<div>
		<label for="dateApplicationCompleted">Date Application Completed</label>
		<input type="date" value="{{ !empty($edit) ? $edit->dateApplicationCompleted : ''}}" name="dateApplicationCompleted">
	</div>
	<div>
		<label for="email">Email</label>
		<input type="email" value="{{ !empty($edit) ? $edit->email : ''}}" name="email">
	</div>
	<div>
		<label for="skypeId">Skype Id</label>
		<input type="text" value="{{ !empty($edit) ? $edit->skypeId : ''}}" required name="skypeId">
	</div>
	<div>
		<select required name="gender">
			<option selected disabled>Sexe</option>
			<option value="male" <?php  if (isset($edit)){ selected($edit, 'gender', 'mal'); } ?>>Male</option>
			<option value="female" <?php  if (isset($edit)){ selected($edit, 'gender', 'female'); } ?>>Female</option>
			<option value="bisexuel" <?php  if (isset($edit)){ selected($edit, 'gender', 'bisexuel'); } ?>>Bisexual</option>
			<option value="other" <?php  if (isset($edit)){ selected($edit, 'gender', 'other'); } ?>>Don't Know</option>
		</select>
	</div>
	<div>
		<label for="dob">Dob</label>
		<input type="text" value="{{ !empty($edit) ? $edit->dob : ''}}" required name="dob">
	</div>
	<div>
		<label for="identityDocument">Identity Document</label>
		<input type="text" value="{{ !empty($edit) ? $edit->identityDocument : ''}}" required name="identityDocument">
	</div>
	<div>
		<label for="address">Address</label>
		<input type="text" value="{{ !empty($edit) ? $edit->address : ''}}" required name="address">
	</div>
	<div>
		<label for="cityResidence">City Residence</label>
		<input type="text"  value="{{ !empty($edit) ? $edit->address : ''}}"required name="cityResidence">
	</div>
	<div>
		<label for="countryResidence">Country Residence</label>
		<input type="text" value="{{ !empty($edit) ? $edit->countryResidence : ''}}" required name="countryResidence">
	</div>
	<div>
		<label for="nationality">Nationality</label>
		<input type="text" value="{{ !empty($edit) ? $edit->nationality : ''}}" required name="nationality">
	</div>
	<div>
		<label for="linkedInURL">linkedIn URL</label>
		<input type="text" value="{{ !empty($edit) ? $edit->linkedInURL : ''}}" required name="linkedInURL">
	</div>
	<div>
		<label for="giHubURL">gitHub URL</label>
		<input type="text" value="{{ !empty($edit) ? $edit->giHubURL : ''}}" required name="giHubURL">
	</div>
	<div>
		<select required name="school">
			<option selected disabled="">Grade</option>
			<option value="BachelorSchool" <?php  if (isset($edit)){ selected($edit, 'school', 'BachelorSchool'); } ?> >BachelorSchool</option>
			<option value="MastersSchool" <?php  if (isset($edit)){ selected($edit, 'school', 'MastersSchool'); } ?> >MastersSchool</option>
			<option value="PhDSchool" <?php  if (isset($edit)){ selected($edit, 'school', 'PhDSchool'); } ?> >PhDSchool</option>
			<option value="nothing" <?php  if (isset($edit)){ selected($edit, 'school', 'nothing'); } ?> >Nothing</option>
			
		</select>
	</div>
	<div>
		<select required name="professionalStatus">
			<option selected disabled>Professional Status</option>
			<option value="employed" <?php  if (isset($edit)){ selected($edit, 'professionalStatus', 'employed'); } ?>>employed</option>
			<option value="student" <?php  if (isset($edit)){ selected($edit, 'professionalStatus', 'student'); } ?>>student</option>
			<option value="entrepreneur" <?php  if (isset($edit)){ selected($edit, 'professionalStatus', 'entrepreneur'); } ?>>entrepreneur</option>
			<option value="other" <?php  if (isset($edit)){ selected($edit, 'professionalStatus', 'nothing'); } ?>>other</option>
			<option value="unemployed" <?php  if (isset($edit)){ selected($edit, 'professionalStatus', 'other'); } ?>>unemployed</option>
		</select>
	</div>
	<div>
		<select required name="maritalStatus">
			<option selected disabled>Marital Status</option>
			<option value="maried"<?php  if (isset($edit)){ selected($edit, 'maritalStatus', 'maried'); } ?>>Maried</option>
			<option value="celibate"<?php  if (isset($edit)){ selected($edit, 'maritalStatus', 'celibate'); } ?>>celibate</option>
			<option value="divorced"<?php  if (isset($edit)){ selected($edit, 'maritalStatus', 'divorced'); } ?>>divorced</option>
		</select>
	</div>
	<div>
		<label for="preferredCountryPostProgram">
			Preferred Country Post Program
		</label>
		<input type="text" value="{{ !empty($edit) ? $edit->preferredCountryPostProgram : ''}}" required name="preferredCountryPostProgram">
	</div>
	<div>
		<label for="motivationLetter">Motivation Letter</label>
		<textarea name="motivationLetter">  @if(!empty($edit)) {{ $edit->motivationLetter}} @else
		@endif</textarea>
	</div>
	<div>
		<label for="scope1">Scope1</label>
		<input type="text" value="{{ !empty($edit) ? $edit->scope1 : ''}}" required name="scope1">
	</div>
	<div>
		<label for="scope2">scope2</label>
		<input type="text" value="{{ !empty($edit) ? $edit->scope2 : ''}}" required name="scope2">
	</div>
	<div>
		@if(!empty($edit)) 
			<input type="submit" name="update" value="Update" name="update">
			<input type="submit" name="update" value="Delete" name="delete">
		@else 
			<input type="submit" name="catrine" value="Submit">
		@endif
	</div>


</form>


<?php 
function selected($edit, $name, $value)
{
	if($edit->$name == $value) {
		echo 'selected';
	}
	return;
}
?>
