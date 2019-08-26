

// wersja z pojedyńczym czytaniem json

$apiCall = ApiCallerFactory::getUsers();
if($apiCall->makeCall()){ //makeCall encoduje json i zapisuje sobie do osobnego parametru dostepnego przez getResponseEncoded()
    $user = UserMapper::getUser($apiCall->getResponseEncoded()); // 
}

// wersja z podwójnym czytaniem json

$apiCall = ApiCallerFactory::getUsers();
if($apiCall->makeCall()){
    $user = UserMapper::getUser($apiCall->getResponse()); // do mappera przekazuję json w wersji string, który trzeba sobie jeszcze encodować.
}