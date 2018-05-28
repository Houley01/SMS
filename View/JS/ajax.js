function GetRoomInfo(val) {
	var reqURL = "../Model/Get_Room.php?RoomDetails=" + val;
	$.ajax({
		url: reqURL,
		method: "GET",
		dataType: "json",
		success: function(result) {
			$('#RoomNumber').html('<option disabled selected>Please Select What Room #</option>');
			$.each(result, function(index, val) {
				$('#RoomNumber').append('<option value="' + val.RoomID + '" name="' + val.RoomName + '">' + val.RoomName + '</option>');
			});
		},
		error(err) {
			console.log(err);
			console.log('An error occured');
		}
	});
}

function OpenJob(elem) {
	$('#Loading_Screen').css({
		'visibility': 'visible'
	});
	var reqURL = "../Model/Job_Get.php?OpenJob=" + elem.value;
	var request = $.ajax({
		url: reqURL,
		method: "GET",
		dataType: "json"
	});
	request.done(function(JobInfo) {
		console.log('Pass');
		console.table(JobInfo);
		document.getElementById('HeaderJobNumber').innerHTML = JobInfo[0].JobID;
		JobID.value = JobInfo[0].JobID;
		UserID.value = JobInfo[0]["F.Name"] + ' ' + JobInfo[0]["L.Name"]; // Due to the data in the repones json puts the name of the varable into a [""]
		DateLogged.value = JobInfo[0].DateLogged;
		RoomID.value = JobInfo[0].BuildingName + ' - Room ' + JobInfo[0].RoomName;
		AssetID.value = JobInfo[0].AssetID;
		Broken_Mouse.value = JobInfo[0].Broken_Mouse;
		Broken_Keyboard.value = JobInfo[0].Broken_Keyboard;
		Broken_Screen.value = JobInfo[0].Broken_Screen;
		ExtraInfo.value = JobInfo[0].ExtraInfo;
		JobStatusID.value = JobInfo[0].JobStatusName;
		PartsUsed.value = JobInfo[0].PartsUsed;
		// FileUpload.filename  = JobInfo[0].Url;
		DateComplete.value = JobInfo[0].DateComplete;
		$('#Loading_Screen').css({
			'visibility': 'hidden'
		})
	});
	request.fail(function(err) {
		console.log(err);
		console.log('An error occured');

	});
}
// View Close Job Details, As well as for Staff View.
function CloseStaffViewableJob(elem) {
	$('#Loading_Screen').css({
		'visibility': 'visible'
	});
	var reqURL = "../Model/Job_Get.php?OpenJob=" + elem.value;
	var request = $.ajax({
		url: reqURL,
		method: "GET",
		dataType: "json"
	});
	request.done(function(JobInfo) {
		console.log('Pass');
		console.table(JobInfo);
		document.getElementById('CloseJobNumber').innerHTML = JobInfo[0].JobID;
		document.getElementById('CloseJobID').innerHTML = JobInfo[0].JobID;
		document.getElementById('CloseUserID').innerHTML = JobInfo[0]["F.Name"] + ' ' + JobInfo[0]["L.Name"]; // Due to the data in the repones json puts the name of the varable into a [""]
		document.getElementById('CloseDateLogged').innerHTML = JobInfo[0].DateLogged;
		document.getElementById('CloseRoomID').innerHTML = JobInfo[0].BuildingName + ' - Room ' + JobInfo[0].RoomName;
		document.getElementById('CloseAssetID').innerHTML = JobInfo[0].AssetID;
		document.getElementById('CloseBroken_Mouse').innerHTML = JobInfo[0].Broken_Mouse;
		document.getElementById('CloseBroken_Keyboard').innerHTML = JobInfo[0].Broken_Keyboard;
		document.getElementById('CloseBroken_Screen').innerHTML = JobInfo[0].Broken_Screen;
		document.getElementById('CloseExtraInfo').innerHTML = JobInfo[0].ExtraInfo;
		document.getElementById('CloseJobStatusID').innerHTML = JobInfo[0].JobStatusName;
		document.getElementById('ClosePartsUsed').innerHTML = JobInfo[0].PartsUsed;
		document.getElementById('CloseDateComplete').innerHTML = JobInfo[0].DateComplete;
		$('#Loading_Screen').css({
			'visibility': 'hidden'
		})
	});
	request.fail(function(err) {
		console.log(err);
		console.log('An error occured');

	});
}

$("#UpdateJob").click(
	function UpdatedJob() {
		$.ajax({

			url: '../Model/Job_Update.php',
			type: 'POST',
			data: $("#ViewJob").serialize(),
			success: function(result) {
				alert('Update Was Successful');
			}
		});
	});

$("#CloseJob").click(
	function Close_Job() {
		$.ajax({

			url: '../Model/Job_Close.php',
			type: 'POST',
			data: $("#ViewJob").serialize(),
			success: function(result) {
				alert('Update Was Successful');
			}
		});
	});


function OpenAsset(elem) {
	$('#Loading_Screen').css({
		'visibility': 'visible'
	});
	var reqURL = "../Model/Asset_Get.php?OpenAsset=" + elem.value;
	var request = $.ajax({
		url: reqURL,
		method: "GET",
		dataType: "json"
	});
	request.done(function(AssetInfo) {
		console.log('Pass');
		console.log(AssetInfo);
		Type.value = AssetInfo[0].Type;
		AssetID.value = AssetInfo[0].AssetID;
		Brand.value = AssetInfo[0].Brand;
		Model.value = AssetInfo[0].Model;
		Serial_Number.value = AssetInfo[0].Serial_Number;
		LocationID.value = AssetInfo[0].BuildingName + ' - Room ' + AssetInfo[0].RoomName;
		DateIntroduced.value = AssetInfo[0].DateIntroduced;
		DateWrittenOff.value = AssetInfo[0].DateWrittenOff;
		$('#Loading_Screen').css({
			'visibility': 'hidden'
		});
	});
	request.fail(function(err) {
		console.log(err);
		console.log('An error occured');
	});
}
$("#UpdateAsset").click(
	function UpdatedAsset() {
		$.ajax({
			url: '../Model/Asset_Update.php',
			type: 'POST',
			data: $("#ViewAsset").serialize(),
			success: function(result) {
				alert('Update Was Successful');
			}
		});
	});

// On Change Load user input into session data.
function OnChangeJobRequest(elem) {
	var JobRequestID = elem.id;
	var JobRequestValue = elem.value;
	var ReqURL = "../Model/Session_Info.php?JobRequest=" + JobRequestID + "&Value=" + JobRequestValue;
	// console.log(elem.value);
	// console.log(elem.id);
	// console.log(Last.value);
	$.ajax({
		// Folder = Model/Session_Info.php ? JobRequest = Element ID & Value = Value of Element
		url: ReqURL,
		type: 'GET',
		success: console.log("Session Info has been up dated"),
		error: function(err) {
			console.log('Broken');
			console.log(err);
		}
	});
}
