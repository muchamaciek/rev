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