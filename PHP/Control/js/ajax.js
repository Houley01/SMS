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
  var reqURL = "../Model/JobUpdate.php?OpenJob=" + elem.value;
  $.ajax({
    url: reqURL,
    method: "GET",
    dataType: "json",
  });
  request.done(function( msg ) {
    console.table(msg);

    JobID.text = msg.JobID;
    Name_Of_Reporter.value = msg.UserID;
    DateLogged.value = msg.DateLogged;
    RoomID.value = msg.RoomID;
    AssetID.value = msg.AssetID;
    Broken_Mouse.value = msg.Broken_Mouse;
    Broken_Keyboard.value = msg.Broken_Keyboard;
    Broken_Screen.value = msg.Broken_Screen;
    ExtraInfo.value = msg.ExtraInfo;
    PartsUsed.value = msg.PartsUsed;
    JobStatusID.value = msg.JobStatusID;
    DateComplete.value = msg.DateComplete;
  });
}
