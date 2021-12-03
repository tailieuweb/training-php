// function checkCardNumber(event){
//     event.preventDefault();
//     var numberscard = "0123456789";
//     var cardnumber = document.getElementById('cardNumber').value();
//     var flag;

//     for (var i=0; i<cardnumber.length; i++) {
//         flag= false;

//         for (var j = 0; j < numberscard.length; j++) {
//             if(cardnumber.charAt(i) == numberscard.charAt(j))
//             {
//                 flag = true;

//             }
//         }
//         if(flag = false){
//             cardnumber = cardnumber.replace(cardnumber.charAt(i), ""); 
//             i--;
//         }
//     }
//     return true;

// }
// function checkNameCard(event){
//     event.preventDefault();
//     var namecard = document.getElementById('nameCard').value;
//     var mess = document.getElementById('errorText');
//     if(namecard == ''){
//         mess.innerHTML += 'card name cannot be blank'
// }
function paymentClick(){
        var cardnumber = document.getElementById('cardNumber').value;
        var namecard = document.getElementById('nameCard').value;
    var expcard = document.getElementById('ExpCard').value;
    var ccvcard = document.getElementById('CCVCard').value;
    
    if(cardnumber != '' && namecard != '' && expcard != '' && ccvcard != ''){
        Swal.fire({
            title: 'Are you payment?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Payment'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Payment success!',
                'Remember to check your transaction history',
                'success'
              )
            }
          })
    }
}