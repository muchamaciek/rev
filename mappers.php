<?

// wersja z pojedyńczym czytaniem json

$apiCall = ApiCallerFactory::getUsers();
if($apiCall->makeCall()){ //makeCall decoduje json i zapisuje sobie do osobnego parametru dostepnego przez getResponseDecoded()
    $user = UserMapper::getUser($apiCall->getResponseDecoded()); // 
}

// wersja z podwójnym czytaniem json

$apiCall = ApiCallerFactory::getUsers();
if($apiCall->makeCall()){
    $user = UserMapper::getUser($apiCall->getResponse()); // do mappera przekazuję json w wersji string, który trzeba sobie jeszcze decodować.
}




// wersja z parserem 

$apiCall = ApiCallerFactory::getUsers();
$apiResult = $apiCall->makeCall();  // obiekt klasy ApiResult jako return
if(ApiResult->getStatus()){
    $user = UserMapper::getUser($apiResult->getParsedResponse());
    // inne rzeczy jeśli potrzebuje
    $phpsesid = $apiResult->getPhpsessid();
    $tocken = $apiResult->getTocken();
}

// wersja z parserem tworzonym ręcznie

$apiCall = ApiCallerFactory::getUsers();
$apiCall->makeCall();  
$apiResult = new ApiResult($apiCall->getRawResponse());
if(ApiResult->getStatus()){
    $user = UserMapper::getUser($apiResult->getParsedResponse());
    // inne rzeczy jeśli potrzebuje
    $phpsesid = $apiResult->getPhpsessid();
    $tocken = $apiResult->getTocken();
}