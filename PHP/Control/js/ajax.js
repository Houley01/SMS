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