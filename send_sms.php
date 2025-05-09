/*

<?php
#require "twilio-php/Services/Twilio.php"; 


 

$client = new Services_Twilio($AccountSid, $AuthToken); 
try { 

    $number="09171481701"; 

    $msg="Success!!"; 

    $message = $client->account->messages->create(array( 

        "From" => "+17015440243", // Paste your phone number here(Refer Step 4) 
        "To" => $number, 
        "Body" => $msg, 
    )); 

} catch (Services_Twilio_RestException $e) { 
    echo $e->getMessage(); 
} 

?> 
?>


*/
