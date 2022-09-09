document.getElementById('get_button').addEventListener('click', () => {
    getApi();
})

async function getApi(){
    let base_url = document.getElementById('base_url').value;
    let endpoint = document.getElementById('endpoint').value;
    console.log(base_url)
    console.log(endpoint)
}

//web scraping