document.getElementById('get_button').addEventListener('click', () => {
    getApi();
})

function PrettyPrintJsonConsole(json) {
    if (typeof json != 'string') {
        json = JSON.stringify(json, undefined, '\t');
    }

    var 
        arr = [],
        _string = 'color:green',
        _number = 'color:darkorange',
        _boolean = 'color:blue',
        _null = 'color:magenta',
        _key = 'color:red';

    json = json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var style = _number;
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                style = _key;
            } else {
                style = _string;
            }
        } else if (/true|false/.test(match)) {
            style = _boolean;
        } else if (/null/.test(match)) {
            style = _null;
        }
        arr.push(style);
        arr.push('');
        return '%c' + match + '%c';
    });

    arr.unshift(json);

    console.log.apply(console, arr);

    return json;
}

async function getApi(){
    let base_url = document.getElementById('base_url').value;
    let endpoint = document.getElementById('endpoint').value;

    let complete_url = base_url + endpoint;

    console.log('Complete Url: ' + complete_url)

    let response = await fetch(complete_url)
    .then( response => response.json() )
    .then( response => {return response} );

    document.getElementById('api_content').value = '';
    document.getElementById('api_content').value = JSON.stringify(response);
}



//web scraping