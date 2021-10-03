<?php

namespace MattKurek\AthenaPHP;

class Response {

    /** 
     *      produces the final http response and sends it to the client with an error status 
     * 
     *      @param string errorMessage - a text string that will be sent back to the client
     * 
     *      @return void returns the final response message to the client and ends the script
     */
    public static function setError(string $errorMessage) {
        
        // create an array to hold the response message;
        $response = array(
            'message' => $errorMessage,
        );

        // set http response code
        http_response_code( 400 ); 

        // send the output object back to the client
        echo json_encode($response);

        exit();

    }

    /** 
     *      produces the final http response and sends it to the client with a success status
     * 
     *      @param string errorMessage - a text string that will be sent back to the client
     * 
     *      @return void returns the final response message to the client and ends the script
     */
    public static function setSuccess($successMessage) {

        if (is_array($successMessage) || is_object($successMessage)) {
            // the full response has already been provided
            $response = $successMessage;
        } else if (is_string($successMessage)) {
            // create an array to hold the response message;
            $response = array(
                'message' => $successMessage,
            );
        } else {
            // create a default message to send back as an error
            $response = array(
                'message' => "An invalid message was provided but supposedly the script succeeded",
            );
        }

        // set http response code
        http_response_code( 200 ); 

        // send the output object back to the client
        echo json_encode($response);

        exit();

    } 

}