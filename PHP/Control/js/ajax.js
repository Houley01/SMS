function GetRoomInfo(elme) {
	var reqURL = "GetRoom.php?RoomDetails=" + elme.value;
	var request = $.ajax({
		url: reqURL,
		method: "GET",
		dataType: "json"
	});
	request.done(function( msg ){
		Room.value = msg.Room;
	});
	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus)
	});
}
