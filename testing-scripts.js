// Getting the json data
const filePath = "Mpesastkresponse.json";

// fetchJSONFromFile(filePath)
//   .then((jsonData) => {
//     console.log(jsonData);
//     // Process the JSON data here
//   })
//   .catch((error) => {
//     console.error("Error fetching JSON data:", error);
//   });


fetch(filePath)
  .then(response => response.json())
  .then(data => {
    console.log(data);
    const checkoutRequestID = data.Body.stkCallback.CheckoutRequestID;
    console.log(checkoutRequestID);
    document.getElementById('feedBack').innerHTML = checkoutRequestID;
  })
  .catch(error => {
    console.error('Error fetching data:', error);
  });