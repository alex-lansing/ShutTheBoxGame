/**
This function extracts from a given cookie 
the 'value' corresponding to the 'name' "username".

If the given cookie has no 'name' called "username", 
then the function returns the empty string.

@param  {string} cookie : pass in document.cookie to cookie to extract information from
@return {string} the 'value' corresponding to the 'name' "username"
                 the empty string if "username" is not a 'name'
*/
function get_username(cookie) {
    let cookieArr  = cookie.split('; ');
    let cookieDict = {};
      
    for (let i=0; i<cookieArr.length; i++) {
            cookieDict[cookieArr[i].split('=')[0]] = cookieArr[i].split('=')[1];
    }
    if (cookieDict['username']) {
    return cookieDict['username'];
    }
    else {
    return "";
    }
  }