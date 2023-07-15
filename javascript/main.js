function openNav() {
	  document.getElementById("mySidenav").style.width = "65%";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	}


	 /*function initialize() {
          var input = document.getElementById('sourceId');
          var to = document.getElementById('destinationId');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
            });
            
             var toAutoComplete = new google.maps.places.Autocomplete(to);
             google.maps.event.addListener(toAutoComplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
            });
        }
         google.maps.event.addDomListener(window, 'load', initialize);*/

         

	// Get the modal
var model = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

var bookButton = document.getElementsByClassName("bookButton");
var priceButton = document.getElementsByClassName("priceButton");

var calculatePriceModel = document.getElementById("calculatePrice_Wrraper");
var span1 = document.getElementsByClassName("close")[1];
var priceInput = document.getElementById("priceInput");

var roundTripBtn = document.getElementsByClassName("roundTripButton")[0];
var oneWayBtn = document.getElementsByClassName("oneWayButton")[0];
var dayRentalBtn = document.getElementsByClassName("dayRentalButton")[0];
/*var returnTime = document.getElementsByClassName("returnTimeGroup")[0];
var returnDate = document.getElementsByClassName("returnDateGroup")[0];
var dayRentalHour = document.getElementsByClassName("dayRentalTimeGroup")[0];
var dayRentalCar = document.getElementsByClassName("dayRentalSelectCar")[0];
var dayRentalGroup = document.getElementsByClassName("dayRentalGroup")[0];*/

var returnpagePickDate = document.getElementsByClassName("returnFormPickupDate")[0];
var returnpageReturnDate = document.getElementsByClassName("returnFormreturnDate")[0];
var onewayPagePickDate = document.getElementsByClassName("onewayFormPickupDate")[0];


var roundTripBtn1 = document.getElementsByClassName("roundTripButton")[1];
var oneWayBtn1 = document.getElementsByClassName("oneWayButton")[1];
var dayRentalBtn1 = document.getElementsByClassName("dayRentalButton")[1];
var returnTime1 = document.getElementsByClassName("returnTimeGroup")[1];
var returnDate1 = document.getElementsByClassName("returnDateGroup")[1];
var dayRentalHour1 = document.getElementsByClassName("dayRentalTimeGroup")[1];
var dayRentalCar1 = document.getElementsByClassName("dayRentalSelectCar")[1];
var dayRentalGroup1 = document.getElementsByClassName("dayRentalGroup")[1];

/* .........................................Filed Group are in bellow................................... */

/*var sourceGroup = document.getElementsByClassName("sourceGroup")[0];*/
/*var travelGroup = document.getElementById("travelGroup");
var pickDateTimeGroup = document.getElementById("pickDateTimeGroup");
var passengerCarGroup = document.getElementById("passengerCarGroup");
var returnDateTimeGroup = document.getElementById("returnDateTimeGroup");*/

var oneWayForm = document.getElementsByClassName("oneWayForm")[0];
var roundTripForm = document.getElementsByClassName("roundTripForm")[0];
var dayRentalForm = document.getElementsByClassName("dayRentalForm")[0];

var travelGroup1 = document.getElementById("travelGroup1");
var pickDateTimeGroup1 = document.getElementById("pickDateTimeGroup1");
var passengerCarGroup1 = document.getElementById("passengerCarGroup1");
var returnDateTimeGroup1 = document.getElementById("returnDateTimeGroup1");




var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if(dd<10){
  dd='0'+dd
} 
if(mm<10){
  mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
returnpagePickDate.setAttribute("min", today);
returnpageReturnDate.setAttribute("min", today);
onewayPagePickDate.setAttribute("min", today);










priceButton.onclick = function() {
	calculatePriceModel.style.display = "block";
}

oneWayBtn.onclick = function(){
	/*returnDate.style.display = "none";
	returnTime.style.display = "none";*/
	/*travelGroup.style.display = "flex";
	pickDateTimeGroup.style.display = "flex";
	passengerCarGroup.style.display = "flex";
	returnDateTimeGroup.style.display = "none";
	dayRentalGroup.style.display = "none";*/
	oneWayForm.style.display = "block";
	roundTripForm.style.display = "none";
	dayRentalForm.style.display = "none"
	roundTripBtn.style.backgroundColor = "white";
	oneWayBtn.style.backgroundColor = "lightgrey";
	dayRentalBtn.style.backgroundColor = "white";
}

roundTripBtn.onclick = function(){
	/*returnDate.style.display = "block";
	returnTime.style.display = "block";*/
	/*travelGroup.style.display = "flex";
	pickDateTimeGroup.style.display = "flex";
	passengerCarGroup.style.display = "flex";
	returnDateTimeGroup.style.display = "flex";
	dayRentalGroup.style.display = "none";*/
	oneWayForm.style.display = "none";
	roundTripForm.style.display = "block";
	dayRentalForm.style.display = "none"
	roundTripBtn.style.backgroundColor = "lightgrey";
	oneWayBtn.style.backgroundColor = "white";
	dayRentalBtn.style.backgroundColor = "white";
}

dayRentalBtn.onclick=function(){
	//alert("its under Maintanance");
	/*travelGroup.style.display = "none";
	pickDateTimeGroup.style.display = "none";
	passengerCarGroup.style.display = "none";
	returnDateTimeGroup.style.display = "none";
	dayRentalGroup.style.display = "block";*/
	oneWayForm.style.display = "none";
	roundTripForm.style.display = "none";
	dayRentalForm.style.display = "block"
	roundTripBtn.style.backgroundColor = "white";
	oneWayBtn.style.backgroundColor = "white";
	dayRentalBtn.style.backgroundColor = "lightgrey";

}

oneWayBtn1.onclick = function(){
	travelGroup1.style.display = "flex";
	pickDateTimeGroup1.style.display = "flex";
	passengerCarGroup1.style.display = "flex";
	returnDateTimeGroup1.style.display = "none";
	dayRentalGroup1.style.display = "none";
	roundTripBtn1.style.backgroundColor = "white";
	oneWayBtn1.style.backgroundColor = "lightgrey";
	dayRentalBtn1.style.backgroundColor = "white";
}

roundTripBtn1.onclick = function(){
	travelGroup1.style.display = "flex";
	pickDateTimeGroup1.style.display = "flex";
	passengerCarGroup1.style.display = "flex";
	returnDateTimeGroup1.style.display = "flex";
	dayRentalGroup1.style.display = "none";
	roundTripBtn1.style.backgroundColor = "lightgrey";
	oneWayBtn1.style.backgroundColor = "white";
	dayRentalBtn1.style.backgroundColor = "white";
}

dayRentalBtn1.onclick=function(){
	//alert("Under Maintanance");
	travelGroup1.style.display = "none";
	pickDateTimeGroup1.style.display = "none";
	passengerCarGroup1.style.display = "none";
	returnDateTimeGroup1.style.display = "none";
	dayRentalGroup1.style.display = "block";
	roundTripBtn1.style.backgroundColor = "white";
	oneWayBtn1.style.backgroundColor = "white";
	dayRentalBtn1.style.backgroundColor = "lightgrey";
}

/* ................................................................................................................................................. */

btn.onclick = function() {
  model.style.display = "block";
}
span.onclick = function() {
  model.style.display = "none";
}
span1.onclick = function() {
  calculatePriceModel.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == model) {
    model.style.display = "none";
    calculatePriceModel.style.display = "none";
  }
}