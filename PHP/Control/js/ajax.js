function GetRoomInfo(val) {
  var reqURL = "../Model/GetRoom.php?RoomDetails=" + val;
  $.ajax({
    url: reqURL,
    method: "GET",
    dataType: "json",
    success: function(result) {
      $('#RoomNumber').html('<option disabled selected>Please Select What Room #</option>');
      $.each(result, function(index, val) {
        $('#RoomNumber').append('<option value="' + val.RoomID + '" name="' + val.RoomName + '">' + val.RoomName + '</option>');
      });
      ////////////////////////////////////////////////////////////
      //                                                        //
      //  BRENDAN WENT THROUGH 3.5 HOURS OF HELL FOR THIS CODE  //
      //                                                        //
      ////////////////////////////////////////////////////////////
    },
    error(err) {
      console.log(err);
      console.log('An error occured');
    }
  });
}

function OpenJob(elem) {
  var reqURL = "../Model/JobGet.php?OpenJob=" + elem.value;
  var request = $.ajax({
    url: reqURL,
    method: "GET",
    dataType: "json"
  });
  request.done(function(JobInfo) {
    console.log('Pass');
    console.table(JobInfo);
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
    DateComplete.value = JobInfo[0].DateComplete;

  });
  request.fail(function(err) {
    console.log(err);
    console.log('An error occured');

  });
}